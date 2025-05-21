export default function transformCloudinaryUrl(originalUrl, transformation = "w_500,h_500,c_fill,f_auto,q_auto") {
  if (!originalUrl.includes("/upload/")) return originalUrl;
  return originalUrl.replace("/upload/", `/upload/${transformation}/`);
}

