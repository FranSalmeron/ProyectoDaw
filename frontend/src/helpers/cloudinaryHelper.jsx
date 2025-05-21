export default function transformCloudinaryUrl(originalUrl, transformation = "w_600,h_600,c_fill,f_auto,q_auto") {
  if (!originalUrl.includes("/upload/")) return originalUrl;
  return originalUrl.replace("/upload/", `/upload/${transformation}/`);
}

