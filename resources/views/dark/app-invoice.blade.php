@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

          @include('layouts.breadcrumb', ['title' => 'Invoice', 'subtitle' => 'Home'])

          <div class="card overflow-hidden invoice-application">
            <div class="d-flex align-items-center justify-content-between gap-6 m-3 d-lg-none">
              <button class="btn btn-primary d-flex" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#chat-sidebar" aria-controls="chat-sidebar">
                <i class="ti ti-menu-2 fs-5"></i>
              </button>
              <form class="position-relative w-100">
                <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh"
                  placeholder="Search Contact">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
              </form>
            </div>
            <div class="d-flex">
              <div class="w-25 d-none d-lg-block border-end user-chat-box">
                <div class="p-3 border-bottom">
                  <form class="position-relative">
                    <input type="search" class="form-control search-invoice ps-5" id="text-srh"
                      placeholder="Search Invoice" />
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                  </form>
                </div>
                <div class="app-invoice">
                  <ul class="overflow-auto invoice-users" data-simplebar>
                    <li>
                      <a href="javascript:void(0)"
                        class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user bg-light-subtle"
                        id="invoice-123" data-invoice-id="123">
                        <div
                          class="btn btn-primary round rounded-circle d-flex align-items-center justify-content-center px-2">
                          <i class="ti ti-user fs-6"></i>
                        </div>
                        <div class="ms-3 d-inline-block w-75">
                          <h6 class="mb-0 invoice-customer">James Anderson</h6>

                          <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">Id: #123</span>
                          <span class="fs-3 invoice-date text-nowrap text-body-color d-block">9 Fab 2020</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)"
                        class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user"
                        id="invoice-124" data-invoice-id="124">
                        <div
                          class="btn btn-danger round rounded-circle d-flex align-items-center justify-content-center px-2">
                          <i class="ti ti-user fs-6"></i>
                        </div>
                        <div class="ms-3 d-inline-block w-75">
                          <h6 class="mb-0 invoice-customer">Bianca Doe</h6>
                          <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">#124</span>
                          <span class="fs-3 invoice-date text-nowrap text-body-color d-block">9 Fab 2020</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)"
                        class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user"
                        id="invoice-125" data-invoice-id="125">
                        <div class="btn btn-info round rounded-circle d-flex align-items-center justify-content-center px-2">
                          <i class="ti ti-user fs-6"></i>
                        </div>
                        <div class="ms-3 d-inline-block w-75">
                          <h6 class="mb-0 invoice-customer">Angelina Rhodes</h6>
                          <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">#125</span>
                          <span class="fs-3 invoice-date text-nowrap text-body-color d-block">9 Fab 2020</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)"
                        class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user"
                        id="invoice-126" data-invoice-id="126">
                        <div
                          class="btn btn-warning round rounded-circle d-flex align-items-center justify-content-center px-2">
                          <i class="ti ti-user fs-6"></i>
                        </div>
                        <div class="ms-3 d-inline-block w-75">
                          <h6 class="mb-0 invoice-customer">Samuel Smith</h6>
                          <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">#126</span>
                          <span class="fs-3 invoice-date text-nowrap text-body-color d-block">9 Fab 2020</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)"
                        class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user"
                        id="invoice-127" data-invoice-id="127">
                        <div
                          class="btn btn-primary round rounded-circle d-flex align-items-center justify-content-center px-2">
                          <i class="ti ti-user fs-6"></i>
                        </div>
                        <div class="ms-3 d-inline-block w-75">
                          <h6 class="mb-0 invoice-customer">Gabriel Jobs</h6>
                          <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">#127</span>
                          <span class="fs-3 invoice-date text-nowrap text-body-color d-block">9 Fab 2020</span>
                        </div>
                      </a>
                    </li>
                    <li></li>
                  </ul>
                </div>
              </div>
              <div class="w-75 w-xs-100 chat-container">
                <div class="invoice-inner-part h-100">
                  <div class="invoiceing-box">
                    <div class="invoice-header d-flex align-items-center border-bottom p-3">
                      <h4 class=" text-uppercase mb-0">Invoice</h4>
                      <div class="ms-auto">
                        <h4 class="invoice-number"></h4>
                      </div>
                    </div>
                    <div class="p-3" id="custom-invoice">
                      <div class="invoice-123" id="printableArea">
                        <div class="row pt-3">
                          <div class="col-md-12">
                            <div>
                              <address>
                                <h6>&nbsp;From,</h6>
                                <h6 class="fw-bold">&nbsp;Steve Jobs</h6>
                                <p class="ms-1">
                                  1108, Clair Street, <br />Massachusetts,
                                  <br />Woods Hole - 02543
                                </p>
                              </address>
                            </div>
                            <div class="text-end">
                              <address>
                                <h6>To,</h6>
                                <h6 class="fw-bold invoice-customer">
                                  James Anderson,
                                </h6>
                                <p class="ms-4">
                                  455, Shobe Lane, <br />Colorado, <br />Fort
                                  Collins - 80524
                                </p>
                                <p class="mt-4 mb-1">
                                  <span>Invoice Date :</span>
                                  <i class="ti ti-calendar"></i>
                                  23rd Jan 2021
                                </p>
                                <p>
                                  <span>Due Date :</span>
                                  <i class="ti ti-calendar"></i>
                                  25th Jan 2021
                                </p>
                              </address>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="table-responsive mt-5">
                              <table class="table table-hover">
                                <thead>
                                  <!-- start row -->
                                  <tr>
                                    <th class="text-center">#</th>
                                    <th>Description</th>
                                    <th class="text-end">Quantity</th>
                                    <th class="text-end">Unit Cost</th>
                                    <th class="text-end">Total</th>
                                  </tr>
                                  <!-- end row -->
                                </thead>
                                <tbody>
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">1</td>
                                    <td>Milk Powder</td>
                                    <td class="text-end">2</td>
                                    <td class="text-end">$24</td>
                                    <td class="text-end">$48</td>
                                  </tr>
                                  <!-- end row -->
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">2</td>
                                    <td>Air Conditioner</td>
                                    <td class="text-end">5</td>
                                    <td class="text-end">$500</td>
                                    <td class="text-end">$2500</td>
                                  </tr>
                                  <!-- end row -->
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">3</td>
                                    <td>RC Cars</td>
                                    <td class="text-end">30</td>
                                    <td class="text-end">$600</td>
                                    <td class="text-end">$18000</td>
                                  </tr>
                                  <!-- end row -->
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">4</td>
                                    <td>Down Coat</td>
                                    <td class="text-end">62</td>
                                    <td class="text-end">$5</td>
                                    <td class="text-end">$310</td>
                                  </tr>
                                  <!-- end row -->
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="pull-right mt-4 text-end">
                              <p>Sub - Total amount: $20,858</p>
                              <p>vat (10%) : $2,085</p>
                              <hr />
                              <h3><b>Total :</b> $22,943</h3>
                            </div>
                            <div class="clearfix"></div>
                            <hr />
                            <div class="text-end">
                              <button class="btn bg-danger-subtle text-danger" type="submit">
                                Proceed to payment
                              </button>
                              <button class="btn btn-primary btn-default print-page ms-6" type="button">
                                <span><i class="ti ti-printer fs-5"></i>
                                  Print</span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- 2 -->
                      <div class="invoice-124" id="printableArea">
                        <div class="row pt-3">
                          <div class="col-md-12">
                            <div>
                              <address>
                                <h6>&nbsp;From,</h6>
                                <h6 class="fw-bold">&nbsp;Steve Jobs</h6>
                                <p class="ms-1">
                                  1108, Clair Street, <br />Massachusetts,
                                  <br />Woods Hole - 02543
                                </p>
                              </address>
                            </div>
                            <div class="text-end">
                              <address>
                                <h6>To,</h6>
                                <h6 class="fw-bold invoice-customer">
                                  Bianca Doe,
                                </h6>
                                <p class="ms-4">
                                  455, Shobe Lane, <br />Colorado, <br />Fort
                                  Collins - 80524
                                </p>
                                <p class="mt-4 mb-1">
                                  <span>Invoice Date :</span>
                                  <i class="ti ti-calendar"></i>
                                  23rd Jan 2021
                                </p>
                                <p>
                                  <span>Due Date :</span>
                                  <i class="ti ti-calendar"></i>
                                  25th Jan 2021
                                </p>
                              </address>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="table-responsive mt-5">
                              <table class="table table-hover">
                                <thead>
                                  <!-- start row -->
                                  <tr>
                                    <th class="text-center">#</th>
                                    <th>Description</th>
                                    <th class="text-end">Quantity</th>
                                    <th class="text-end">Unit Cost</th>
                                    <th class="text-end">Total</th>
                                  </tr>
                                  <!-- end row -->
                                </thead>
                                <tbody>
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">1</td>
                                    <td>Milk Powder</td>
                                    <td class="text-end">2</td>
                                    <td class="text-end">$24</td>
                                    <td class="text-end">$48</td>
                                  </tr>
                                  <!-- end row -->
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">2</td>
                                    <td>Air Conditioner</td>
                                    <td class="text-end">5</td>
                                    <td class="text-end">$500</td>
                                    <td class="text-end">$2500</td>
                                  </tr>
                                  <!-- end row -->
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">3</td>
                                    <td>RC Cars</td>
                                    <td class="text-end">30</td>
                                    <td class="text-end">$600</td>
                                    <td class="text-end">$18000</td>
                                  </tr>
                                  <!-- end row -->
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">4</td>
                                    <td>Down Coat</td>
                                    <td class="text-end">62</td>
                                    <td class="text-end">$5</td>
                                    <td class="text-end">$310</td>
                                  </tr>
                                  <!-- end row -->
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="pull-right mt-4 text-end">
                              <p>Sub - Total amount: $20,858</p>
                              <p>vat (10%) : $2,085</p>
                              <hr />
                              <h3><b>Total :</b> $22,943</h3>
                            </div>
                            <div class="clearfix"></div>
                            <hr />
                            <div class="text-end">
                              <button class="btn bg-danger-subtle text-danger" type="submit">
                                Proceed to payment
                              </button>
                              <button class="btn btn-primary btn-default print-page ms-6" type="button">
                                <span><i class="ti ti-printer fs-5"></i>
                                  Print</span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- 3 -->
                      <div class="invoice-125" id="printableArea">
                        <div class="row pt-3">
                          <div class="col-md-12">
                            <div>
                              <address>
                                <h6>&nbsp;From,</h6>
                                <h6 class="fw-bold">&nbsp;Steve Jobs</h6>
                                <p class="ms-1">
                                  1108, Clair Street, <br />Massachusetts,
                                  <br />Woods Hole - 02543
                                </p>
                              </address>
                            </div>
                            <div class="text-end">
                              <address>
                                <h6>To,</h6>
                                <h6 class="fw-bold invoice-customer">
                                  Angelina Rhodes,
                                </h6>
                                <p class="ms-4">
                                  455, Shobe Lane, <br />Colorado, <br />Fort
                                  Collins - 80524
                                </p>
                                <p class="mt-4 mb-1">
                                  <span>Invoice Date :</span>
                                  <i class="ti ti-calendar"></i>
                                  23rd Jan 2021
                                </p>
                                <p>
                                  <span>Due Date :</span>
                                  <i class="ti ti-calendar"></i>
                                  25th Jan 2021
                                </p>
                              </address>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="table-responsive mt-5">
                              <table class="table table-hover">
                                <thead>
                                  <!-- start row -->
                                  <tr>
                                    <th class="text-center">#</th>
                                    <th>Description</th>
                                    <th class="text-end">Quantity</th>
                                    <th class="text-end">Unit Cost</th>
                                    <th class="text-end">Total</th>
                                  </tr>
                                  <!-- end row -->
                                </thead>
                                <tbody>
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">1</td>
                                    <td>Milk Powder</td>
                                    <td class="text-end">2</td>
                                    <td class="text-end">$24</td>
                                    <td class="text-end">$48</td>
                                  </tr>
                                  <!-- end row -->
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">2</td>
                                    <td>Air Conditioner</td>
                                    <td class="text-end">5</td>
                                    <td class="text-end">$500</td>
                                    <td class="text-end">$2500</td>
                                  </tr>
                                  <!-- end row -->
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">3</td>
                                    <td>RC Cars</td>
                                    <td class="text-end">30</td>
                                    <td class="text-end">$600</td>
                                    <td class="text-end">$18000</td>
                                  </tr>
                                  <!-- end row -->
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">4</td>
                                    <td>Down Coat</td>
                                    <td class="text-end">62</td>
                                    <td class="text-end">$5</td>
                                    <td class="text-end">$310</td>
                                  </tr>
                                  <!-- end row -->
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="pull-right mt-4 text-end">
                              <p>Sub - Total amount: $20,858</p>
                              <p>vat (10%) : $2,085</p>
                              <hr />
                              <h3><b>Total :</b> $22,943</h3>
                            </div>
                            <div class="clearfix"></div>
                            <hr />
                            <div class="text-end">
                              <button class="btn bg-danger-subtle text-danger" type="submit">
                                Proceed to payment
                              </button>
                              <button class="btn btn-primary btn-default print-page ms-6" type="button">
                                <span><i class="ti ti-printer fs-5"></i>
                                  Print</span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- 4 -->
                      <div class="invoice-126" id="printableArea">
                        <div class="row pt-3">
                          <div class="col-md-12">
                            <div>
                              <address>
                                <h6>&nbsp;From,</h6>
                                <h6 class="fw-bold">&nbsp;Steve Jobs</h6>
                                <p class="ms-1">
                                  1108, Clair Street, <br />Massachusetts,
                                  <br />Woods Hole - 02543
                                </p>
                              </address>
                            </div>
                            <div class="text-end">
                              <address>
                                <h6>To,</h6>
                                <h6 class="fw-bold invoice-customer">
                                  Samuel Smith,
                                </h6>
                                <p class="ms-4">
                                  455, Shobe Lane, <br />Colorado, <br />Fort
                                  Collins - 80524
                                </p>
                                <p class="mt-4 mb-1">
                                  <span>Invoice Date :</span>
                                  <i class="ti ti-calendar"></i>
                                  23rd Jan 2021
                                </p>
                                <p>
                                  <span>Due Date :</span>
                                  <i class="ti ti-calendar"></i>
                                  25th Jan 2021
                                </p>
                              </address>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="table-responsive mt-5">
                              <table class="table table-hover">
                                <thead>
                                  <!-- start row -->
                                  <tr>
                                    <th class="text-center">#</th>
                                    <th>Description</th>
                                    <th class="text-end">Quantity</th>
                                    <th class="text-end">Unit Cost</th>
                                    <th class="text-end">Total</th>
                                  </tr>
                                  <!-- end row -->
                                </thead>
                                <tbody>
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">1</td>
                                    <td>Milk Powder</td>
                                    <td class="text-end">2</td>
                                    <td class="text-end">$24</td>
                                    <td class="text-end">$48</td>
                                  </tr>
                                  <!-- end row -->
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">2</td>
                                    <td>Air Conditioner</td>
                                    <td class="text-end">5</td>
                                    <td class="text-end">$500</td>
                                    <td class="text-end">$2500</td>
                                  </tr>
                                  <!-- end row -->
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">3</td>
                                    <td>RC Cars</td>
                                    <td class="text-end">30</td>
                                    <td class="text-end">$600</td>
                                    <td class="text-end">$18000</td>
                                  </tr>
                                  <!-- end row -->
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">4</td>
                                    <td>Down Coat</td>
                                    <td class="text-end">62</td>
                                    <td class="text-end">$5</td>
                                    <td class="text-end">$310</td>
                                  </tr>
                                  <!-- end row -->
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="pull-right mt-4 text-end">
                              <p>Sub - Total amount: $20,858</p>
                              <p>vat (10%) : $2,085</p>
                              <hr />
                              <h3><b>Total :</b> $22,943</h3>
                            </div>
                            <div class="clearfix"></div>
                            <hr />
                            <div class="text-end">
                              <button class="btn bg-danger-subtle text-danger" type="submit">
                                Proceed to payment
                              </button>
                              <button class="btn btn-primary btn-default print-page ms-6" type="button">
                                <span><i class="ti ti-printer fs-5"></i>
                                  Print</span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- 5 -->
                      <div class="invoice-127" id="printableArea">
                        <div class="row pt-3">
                          <div class="col-md-12">
                            <div>
                              <address>
                                <h6>&nbsp;From,</h6>
                                <h6 class="fw-bold">&nbsp;Steve Jobs</h6>
                                <p class="ms-1">
                                  1108, Clair Street, <br />Massachusetts,
                                  <br />Woods Hole - 02543
                                </p>
                              </address>
                            </div>
                            <div class="text-end">
                              <address>
                                <h6>To,</h6>
                                <h6 class="fw-bold invoice-customer">
                                  Gabriel Jobs,
                                </h6>
                                <p class="ms-4">
                                  455, Shobe Lane, <br />Colorado, <br />Fort
                                  Collins - 80524
                                </p>
                                <p class="mt-4 mb-1">
                                  <span>Invoice Date :</span>
                                  <i class="ti ti-calendar"></i>
                                  23rd Jan 2021
                                </p>
                                <p>
                                  <span>Due Date :</span>
                                  <i class="ti ti-calendar"></i>
                                  25th Jan 2021
                                </p>
                              </address>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="table-responsive mt-5">
                              <table class="table table-hover">
                                <thead>
                                  <!-- start row -->
                                  <tr>
                                    <th class="text-center">#</th>
                                    <th>Description</th>
                                    <th class="text-end">Quantity</th>
                                    <th class="text-end">Unit Cost</th>
                                    <th class="text-end">Total</th>
                                  </tr>
                                  <!-- end row -->
                                </thead>
                                <tbody>
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">1</td>
                                    <td>Milk Powder</td>
                                    <td class="text-end">2</td>
                                    <td class="text-end">$24</td>
                                    <td class="text-end">$48</td>
                                  </tr>
                                  <!-- end row -->
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">2</td>
                                    <td>Air Conditioner</td>
                                    <td class="text-end">5</td>
                                    <td class="text-end">$500</td>
                                    <td class="text-end">$2500</td>
                                  </tr>
                                  <!-- end row -->
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">3</td>
                                    <td>RC Cars</td>
                                    <td class="text-end">30</td>
                                    <td class="text-end">$600</td>
                                    <td class="text-end">$18000</td>
                                  </tr>
                                  <!-- end row -->
                                  <!-- start row -->
                                  <tr>
                                    <td class="text-center">4</td>
                                    <td>Down Coat</td>
                                    <td class="text-end">62</td>
                                    <td class="text-end">$5</td>
                                    <td class="text-end">$310</td>
                                  </tr>
                                  <!-- end row -->
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="pull-right mt-4 text-end">
                              <p>Sub - Total amount: $20,858</p>
                              <p>vat (10%) : $2,085</p>
                              <hr />
                              <h3><b>Total :</b> $22,943</h3>
                            </div>
                            <div class="clearfix"></div>
                            <hr />
                            <div class="text-end">
                              <button class="btn bg-danger-subtle text-danger" type="submit">
                                Proceed to payment
                              </button>
                              <button class="btn btn-primary btn-default print-page ms-6" type="button">
                                <span><i class="ti ti-printer fs-5"></i>
                                  Print</span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="offcanvas offcanvas-start user-chat-box" tabindex="-1" id="chat-sidebar"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                    Invoice
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="p-3 border-bottom">
                  <form class="position-relative">
                    <input type="search" class="form-control search-invoice ps-5" id="text-srh"
                      placeholder="Search Invoice">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                  </form>
                </div>
                <div class="app-invoice overflow-auto">
                  <ul class="invoice-users">
                    <li>
                      <a href="javascript:void(0)"
                        class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user bg-light"
                        id="invoice-123" data-invoice-id="123">
                        <div
                          class="btn btn-primary round rounded-circle d-flex align-items-center justify-content-center px-2">
                          <i class="ti ti-user fs-6"></i>
                        </div>
                        <div class="ms-3 d-inline-block w-75">
                          <h6 class="mb-0 invoice-customer">James Anderson</h6>

                          <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">Id: #123</span>
                          <span class="fs-3 invoice-date text-nowrap text-body-color d-block">9 Fab 2020</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)"
                        class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user"
                        id="invoice-124" data-invoice-id="124">
                        <div
                          class="btn btn-danger round rounded-circle d-flex align-items-center justify-content-center px-2">
                          <i class="ti ti-user fs-6"></i>
                        </div>
                        <div class="ms-3 d-inline-block w-75">
                          <h6 class="mb-0 invoice-customer">Bianca Doe</h6>
                          <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">#124</span>
                          <span class="fs-3 invoice-date text-nowrap text-body-color d-block">9 Fab 2020</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)"
                        class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user"
                        id="invoice-125" data-invoice-id="125">
                        <div class="btn btn-info round rounded-circle d-flex align-items-center justify-content-center px-2">
                          <i class="ti ti-user fs-6"></i>
                        </div>
                        <div class="ms-3 d-inline-block w-75">
                          <h6 class="mb-0 invoice-customer">Angelina Rhodes</h6>
                          <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">#125</span>
                          <span class="fs-3 invoice-date text-nowrap text-body-color d-block">9 Fab 2020</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)"
                        class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user"
                        id="invoice-126" data-invoice-id="126">
                        <div
                          class="btn btn-warning round rounded-circle d-flex align-items-center justify-content-center px-2">
                          <i class="ti ti-user fs-6"></i>
                        </div>
                        <div class="ms-3 d-inline-block w-75">
                          <h6 class="mb-0 invoice-customer">Samuel Smith</h6>
                          <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">#126</span>
                          <span class="fs-3 invoice-date text-nowrap text-body-color d-block">9 Fab 2020</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)"
                        class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user"
                        id="invoice-127" data-invoice-id="127">
                        <div
                          class="btn btn-primary round rounded-circle d-flex align-items-center justify-content-center px-2">
                          <i class="ti ti-user fs-6"></i>
                        </div>
                        <div class="ms-3 d-inline-block w-75">
                          <h6 class="mb-0 invoice-customer">Gabriel Jobs</h6>
                          <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">#127</span>
                          <span class="fs-3 invoice-date text-nowrap text-body-color d-block">9 Fab 2020</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

@endsection

@section('scripts')
  <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/fullcalendar/index.global.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/apps/invoice.js') }}"></script>
  <script src="{{ URL::asset('build/js/apps/jquery.PrintArea.js') }}"></script>
@endsection

