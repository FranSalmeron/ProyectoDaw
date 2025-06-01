export default function transformCloudinaryUrl(originalUrl, transformation = "w_400,h_400,c_fill,f_auto,q_auto") {
  if (!originalUrl.includes("/upload/")) return originalUrl;
  return originalUrl.replace("/upload/", `/upload/${transformation}/`);
}

