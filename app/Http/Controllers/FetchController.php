<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Vinkla\Hashids\Facades\Hashids;

class FetchController extends Controller
{
    /**
     * Generic fetch endpoint used by Select2 helper to retrieve master data.
     * Expected parameters (via GET/POST):
     *   - q: search term (optional)
     *   - parameter: JSON encoded object containing:
     *       t: encrypted table name
     *       s: encrypted comma‑separated select columns (first is id, second is text)
     *       j: optional joins array
     *       w: optional where conditions array
     *       limit: optional max rows (default 10)
     *       group: optional encrypted group‑by columns
     *   - except: comma‑separated ids to exclude
     *   - onlyin: comma‑separated Hashids (or numeric ids) to include
     */
    public function globalfetch(Request $param)
    {
        $q = $param->input('q');
        $parameter = $param->input('parameter');

        if (!$parameter || !isset($parameter['t']) || !isset($parameter['s'])) {
            return response()->json(['item' => []]);
        }

        try {
            $tableName = decrypt($parameter['t']);
            $query = DB::table($tableName);
            $except = $param->input('except');
            $onlyin = $param->input('onlyin');
            $select = explode(',', decrypt($parameter['s']));

            // Build raw select expressions to preserve aliases/functions
            $rawSelect = [];
            foreach ($select as $column) {
                $rawSelect[] = DB::raw($column);
            }
            $query->select($rawSelect);

            // Joins handling
            if (!empty($parameter['j']) && is_array($parameter['j'])) {
                foreach ($parameter['j'] as $key => $value) {
                    if ($value['type'] === 'inner') {
                        $query->join($value['t'], $value['fieldA'], $value['operator'], $value['fieldB']);
                    } elseif ($value['type'] === 'left') {
                        $query->leftJoin($value['t'], $value['fieldA'], $value['operator'], $value['fieldB']);
                    } elseif ($value['type'] === 'right') {
                        $query->rightJoin($value['t'], $value['fieldA'], $value['operator'], $value['fieldB']);
                    }
                }
            }

            // Where clauses
            if (!empty($parameter['w'])) {
                $this->applyWheres($query, $parameter['w'], $select, $q);
            }

            // Exclude specific ids
            $idColumn = explode(',', decrypt($parameter['s']))[0];
            if (!empty($except)) {
                $exceptArr = array_filter(explode(',', $except));
                $query->whereNotIn($idColumn, $exceptArr);
            }

            // Include only specific ids (decoded via Hashids)
            if (!empty($onlyin)) {
                $onlyinArr = array_filter(explode(',', $onlyin));
                $decodedOnlyin = [];
                foreach ($onlyinArr as $value) {
                    $decoded = Hashids::decode($value);
                    if (!empty($decoded)) {
                        $decodedOnlyin[] = $decoded[0];
                    } elseif (is_numeric($value)) {
                        $decodedOnlyin[] = $value;
                    }
                }
                if (!empty($decodedOnlyin)) {
                    $query->whereIn($idColumn, $decodedOnlyin);
                }
            }

            // Group By support
            if (!empty($parameter['group'])) {
                $query->groupBy(explode(',', decrypt($parameter['group'])));
            }

            // Limit
            $limit = (!empty($parameter['limit'])) ? $parameter['limit'] : 10;
            $query->limit($limit);

            $result = $query->get();

            $data = [];
            $i = 0;
            $selectColumns = explode(',', decrypt($parameter['s']));
            foreach ($result as $valueres) {
                $j = 0;
                foreach ($selectColumns as $value) {
                    // Resolve column alias / dot notation to property name
                    $propertyName = trim($value);
                    if (preg_match('/as\s+([a-zA-Z0-9_]+)/i', $value, $matches)) {
                        $propertyName = $matches[1];
                    } elseif (strpos($value, '.') !== false) {
                        $parts = explode('.', $value);
                        $propertyName = end($parts);
                    }

                    if ($j === 0) {
                        $data[$i]['id'] = $valueres->{$propertyName};
                    } elseif ($j === 1) {
                        $data[$i]['text'] = $valueres->{$propertyName} ?? 'No Name';
                    } else {
                        $data[$i][$propertyName] = $valueres->{$propertyName};
                    }
                    $j++;
                }
                $i++;
            }

            return response()->json(['item' => $data]);
        } catch (\Exception $e) {
            return response()->json(['item' => [], 'error' => $e->getMessage()]);
        }
    }

    /**
     * Recursively apply where conditions supplied by the Select2 helper.
     */
    private function applyWheres($query, $wheres, $select, $q)
    {
        foreach ($wheres as $key => $value) {
            $method = (!empty($value['condition']) && strtolower($value['condition']) === 'or') ? 'orWhere' : 'where';

            // Nested conditions
            if (!empty($value['nested']) && is_array($value['nested'])) {
                $query->$method(function ($sub) use ($value, $select, $q) {
                    $this->applyWheres($sub, $value['nested'], $select, $q);
                });
                continue;
            }

            $operator = $value['operator'] ?? '=';
            if (strtolower($operator) === 'like') {
                $operator = (config('database.default') === 'pgsql') ? 'ilike' : 'like';
            }

            $likeWrapper = '';
            if (in_array(strtolower($operator), ['like', 'ilike'])) {
                $likeWrapper = '%';
            }

            // Resolve field (handle encrypted field names)
            if (strpos($value['field'], 'select-index-') !== false) {
                $index = str_replace('select-index-', '', $value['field']);
                $thefield = $select[$index];
            } else {
                $thefield = decrypt($value['field']);
            }

            // Strip alias for raw column reference
            if (preg_match('/(.+)\s+as\s+[a-zA-Z0-9_]+/i', $thefield, $matches)) {
                $thefield = $matches[1];
            }

            $whereValue = $likeWrapper . ($value['value'] === '-NMSearch-' ? $q : $value['value']) . $likeWrapper;
            $query->$method(DB::raw($thefield), $operator, $whereValue);
        }
    }
}
?>
