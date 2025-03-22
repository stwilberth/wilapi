// vite.config.js
import { defineConfig } from "file:///C:/laragon/www/wilapi/node_modules/.pnpm/vite@5.4.14/node_modules/vite/dist/node/index.js";
import laravel, { refreshPaths } from "file:///C:/laragon/www/wilapi/node_modules/.pnpm/laravel-vite-plugin@1.2.0_vite@5.4.14/node_modules/laravel-vite-plugin/dist/index.js";
var vite_config_default = defineConfig({
  plugins: [
    laravel({
      input: ["resources/css/app.css", "resources/js/app.js"],
      refresh: [
        ...refreshPaths,
        "app/Filament/**",
        "app/Forms/Components/**",
        "app/Livewire/**",
        "app/Infolists/Components/**",
        "app/Providers/Filament/**",
        "app/Tables/Columns/**"
      ]
    })
  ]
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCJDOlxcXFxsYXJhZ29uXFxcXHd3d1xcXFx3aWxhcGlcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfZmlsZW5hbWUgPSBcIkM6XFxcXGxhcmFnb25cXFxcd3d3XFxcXHdpbGFwaVxcXFx2aXRlLmNvbmZpZy5qc1wiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9pbXBvcnRfbWV0YV91cmwgPSBcImZpbGU6Ly8vQzovbGFyYWdvbi93d3cvd2lsYXBpL3ZpdGUuY29uZmlnLmpzXCI7aW1wb3J0IHsgZGVmaW5lQ29uZmlnIH0gZnJvbSAndml0ZSdcbmltcG9ydCBsYXJhdmVsLCB7IHJlZnJlc2hQYXRocyB9IGZyb20gJ2xhcmF2ZWwtdml0ZS1wbHVnaW4nXG5cbmV4cG9ydCBkZWZhdWx0IGRlZmluZUNvbmZpZyh7XG4gICAgcGx1Z2luczogW1xuICAgICAgICBsYXJhdmVsKHtcbiAgICAgICAgICAgIGlucHV0OiBbJ3Jlc291cmNlcy9jc3MvYXBwLmNzcycsICdyZXNvdXJjZXMvanMvYXBwLmpzJ10sXG4gICAgICAgICAgICByZWZyZXNoOiBbXG4gICAgICAgICAgICAgICAgLi4ucmVmcmVzaFBhdGhzLFxuICAgICAgICAgICAgICAgICdhcHAvRmlsYW1lbnQvKionLFxuICAgICAgICAgICAgICAgICdhcHAvRm9ybXMvQ29tcG9uZW50cy8qKicsXG4gICAgICAgICAgICAgICAgJ2FwcC9MaXZld2lyZS8qKicsXG4gICAgICAgICAgICAgICAgJ2FwcC9JbmZvbGlzdHMvQ29tcG9uZW50cy8qKicsXG4gICAgICAgICAgICAgICAgJ2FwcC9Qcm92aWRlcnMvRmlsYW1lbnQvKionLFxuICAgICAgICAgICAgICAgICdhcHAvVGFibGVzL0NvbHVtbnMvKionLFxuICAgICAgICAgICAgXSxcbiAgICAgICAgfSksXG4gICAgXSxcbn0pXG4iXSwKICAibWFwcGluZ3MiOiAiO0FBQXlQLFNBQVMsb0JBQW9CO0FBQ3RSLE9BQU8sV0FBVyxvQkFBb0I7QUFFdEMsSUFBTyxzQkFBUSxhQUFhO0FBQUEsRUFDeEIsU0FBUztBQUFBLElBQ0wsUUFBUTtBQUFBLE1BQ0osT0FBTyxDQUFDLHlCQUF5QixxQkFBcUI7QUFBQSxNQUN0RCxTQUFTO0FBQUEsUUFDTCxHQUFHO0FBQUEsUUFDSDtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsTUFDSjtBQUFBLElBQ0osQ0FBQztBQUFBLEVBQ0w7QUFDSixDQUFDOyIsCiAgIm5hbWVzIjogW10KfQo=
