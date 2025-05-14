
export default function transformCloudinaryUrl(originalUrl, transformation = "w_600,c_fit,f_auto,q_auto") {
  if (!originalUrl.includes("/upload/")) return originalUrl; // No tocar si no es una URL válida
  return originalUrl.replace("/upload/", `/upload/${transformation}/`);
}
