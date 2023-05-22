import { defineConfig } from "vite";
import { fileURLToPath } from "url";
import path from "path";

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [],
  build: {
    outDir: fileURLToPath(new URL("./assets/dist", import.meta.url)),
    emptyOutDir: true,
    lib: {
      entry: path.resolve(__dirname, "src/main.ts"),
      name: "jasmine",
      fileName: "jasmine",
      formats: ["iife"],
    },
  },
});
