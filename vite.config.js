import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

import fs from 'fs-extra';

import path from 'path';

const folder = {
    src: "resources/", // source files
    src_assets: "resources/", // source assets files
    dist: "public/", // build files
    dist_assets: "public/build/" //build assets files
};

export default defineConfig({
    build: {
        manifest: true,
        rtl: true,
        outDir: folder.dist_assets,
        cssCodeSplit: true,
        rollupOptions: {
            output: {
                assetFileNames: (css) => {
                    if (css.name.split('.').pop() == 'css') {
                        return 'css/' + `[name]` + '.css';
                    } else {
                        return 'icons/' + css.name;
                    }
                },
                entryFileNames: 'js/' + `[name]` + `.js`,
            },
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/styles-rtl.css',
                'resources/scss/styles.scss',
                'resources/css/custom_datatable.css',
                'resources/css/custom_select2.css',
                'resources/css/custom.css',
            ],
            refresh: true,
        }),
        {
            name: 'copy-assets',
            async writeBundle() {
                try {
                    // Copy images, fonts, and js
                    await Promise.all([
                        fs.copy(folder.src_assets + 'images', folder.dist_assets + 'images'),
                        fs.copy(folder.src_assets + 'fonts', folder.dist_assets + 'fonts'),
                        fs.copy(folder.src_assets + 'js', folder.dist_assets + 'js'),
                        // fs.copy(folder.src_assets + 'libs', folder.dist_assets + 'libs'),
                    ]);

                } catch (error) {
                    console.error('Error copying assets:', error);
                }
            },
        },
        {
            name: "copy-specific-packages",
            async writeBundle() {
                const outputPath = path.resolve(__dirname, folder.dist_assets); // Adjust the destination path
                const outputPathSrc = path.resolve(__dirname, folder.src_assets); // Adjust the destination path
                const configPath = path.resolve(__dirname, "package-libs-config.json");

                try {
                    const configContent = await fs.readFile(configPath, "utf-8");
                    const { packagesToCopy } = JSON.parse(configContent);

                    for (const packageName of packagesToCopy) {
                        let isDist = fs.existsSync(
                            path.join(__dirname, "node_modules", packageName + "/dist")
                        )
                        const destPackagePath = path.join(
                            outputPath,
                            "libs",
                            packageName,
                            isDist ? "/dist" : ""
                        );
                        const destPackagePathSrc = path.join(
                            outputPathSrc,
                            "libs",
                            packageName,
                            isDist ? "/dist" : ""
                        );

                        const sourcePath = fs.existsSync(
                            path.join(__dirname, "node_modules", packageName + "/dist")
                        )
                            ? path.join(__dirname, "node_modules", packageName + "/dist")
                            : path.join(__dirname, "node_modules", packageName);

                        try {
                            await fs.access(sourcePath, fs.constants.F_OK);
                            await fs.copy(sourcePath, destPackagePath);
                            await fs.copy(sourcePath, destPackagePathSrc);
                        } catch (error) {
                            console.error(`Package ${packageName} does not exist.`);
                        }
                    }
                } catch (error) {
                    console.error("Error copying and renaming packages:", error);
                }
            },
        },
    ],
});
