import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react-swc'

// https://vite.dev/config/
export default defineConfig({
  plugins: [
    react(),],
  server:{
    host:"0.0.0.0", // configucion para poder trabajar en el entorno de desarrollo real
    port:3000,
    // allowedHosts:['frontend']
  }
})

