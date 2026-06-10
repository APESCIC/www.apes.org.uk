const http = require("http");
const fs = require("fs");
const path = require("path");

const bindHost = process.argv[2] || "127.0.0.1";
const port = Number.parseInt(process.argv[3] || "8080", 10);
const publicRoot = path.resolve(process.argv[4] || path.join(__dirname, "..", "public"));

const redirects = new Map([
  ["/index", "/"],
  ["/missions/our-main-mission-statement", "/mission/our-main-mission-statement/"],
  ["/missions/our-main-mission-statement/", "/mission/our-main-mission-statement/"],
  ["/missions/support-ethical-rehabilitation", "/mission/support-ethical-rehabilitation/"],
  ["/missions/support-ethical-rehabilitation/", "/mission/support-ethical-rehabilitation/"],
  ["/changelog", "/change-log-hub/"],
  ["/changelog/", "/change-log-hub/"],
  ["/change-log", "/change-log-hub/"],
  ["/change-log/", "/change-log-hub/"],
  ["/news/post/Introducing-the-new-APES-CareBase", "https://www.apesnews.org.uk/introducing-the-new-myapes-manage-your-details-online/"],
  ["/news/post/Introducing-the-new-APES-CareBase/", "https://www.apesnews.org.uk/introducing-the-new-myapes-manage-your-details-online/"],
  ["/news/post/Urgent-APES-Must-Relocate-by-3-March-2026", "https://www.apesnews.org.uk/tag/apes-cic/"],
  ["/news/post/Urgent-APES-Must-Relocate-by-3-March-2026/", "https://www.apesnews.org.uk/tag/apes-cic/"],
  ["/news/post/APES-Partners-with-Double-the-Donation-to-Double-Your-Donation-Impact", "https://www.apesnews.org.uk/tag/apes-donor-community/"],
  ["/news/post/APES-Partners-with-Double-the-Donation-to-Double-Your-Donation-Impact/", "https://www.apesnews.org.uk/tag/apes-donor-community/"],
  ["/news/post/important-update-temporary-move-what-it-means-for-you", "https://www.apesnews.org.uk/tag/apes-cic/"],
  ["/news/post/important-update-temporary-move-what-it-means-for-you/", "https://www.apesnews.org.uk/tag/apes-cic/"],
  ["/news/post/fundraising-appeal-help-apes-invest-in-essential-welfare-management-software", "https://www.apesnews.org.uk/tag/apes-donor-community/"],
  ["/news/post/fundraising-appeal-help-apes-invest-in-essential-welfare-management-software/", "https://www.apesnews.org.uk/tag/apes-donor-community/"],
  ["/news/tag/moving-properties", "https://www.apesnews.org.uk/tag/apes-cic/"],
  ["/news/tag/moving-properties/", "https://www.apesnews.org.uk/tag/apes-cic/"],
  ["/news/tag/funds", "https://www.apesnews.org.uk/tag/apes-donor-community/"],
  ["/news/tag/funds/", "https://www.apesnews.org.uk/tag/apes-donor-community/"],
]);

const contentTypes = {
  ".css": "text/css; charset=utf-8",
  ".js": "application/javascript; charset=utf-8",
  ".json": "application/json; charset=utf-8",
  ".xml": "application/xml; charset=utf-8",
  ".txt": "text/plain; charset=utf-8",
  ".svg": "image/svg+xml",
  ".webp": "image/webp",
  ".png": "image/png",
  ".jpg": "image/jpeg",
  ".jpeg": "image/jpeg",
  ".ico": "image/x-icon",
  ".webmanifest": "application/manifest+json; charset=utf-8",
  ".html": "text/html; charset=utf-8",
};

function sendFile(response, filePath, statusCode = 200) {
  const extension = path.extname(filePath).toLowerCase();
  response.writeHead(statusCode, {
    "Content-Type": contentTypes[extension] || "application/octet-stream",
  });

  fs.createReadStream(filePath).pipe(response);
}

function sendErrorPage(response, statusCode) {
  const pagePath = path.join(publicRoot, `${statusCode}.html`);

  if (fs.existsSync(pagePath)) {
    sendFile(response, pagePath, statusCode);
    return;
  }

  response.writeHead(statusCode, { "Content-Type": "text/plain; charset=utf-8" });
  response.end(statusCode === 403 ? "Forbidden" : "Not found");
}

function isForbiddenPath(pathname) {
  return pathname.startsWith("/.") || ["/includes", "/outputs", "/scripts"].some((prefix) => pathname === prefix || pathname.startsWith(`${prefix}/`));
}

function resolveWithinPublic(pathname) {
  const relativePath = pathname.replace(/^\/+/, "");
  const resolved = path.resolve(publicRoot, relativePath);
  return resolved.startsWith(publicRoot) ? resolved : null;
}

const server = http.createServer((request, response) => {
  const parsedUrl = new URL(request.url, `http://${bindHost}:${port}`);
  const pathname = decodeURIComponent(parsedUrl.pathname);

  if (redirects.has(pathname)) {
    response.writeHead(301, { Location: redirects.get(pathname) });
    response.end();
    return;
  }

  if (isForbiddenPath(pathname)) {
    sendErrorPage(response, 403);
    return;
  }

  if (pathname === "/") {
    sendFile(response, path.join(publicRoot, "index.html"));
    return;
  }

  const resolved = resolveWithinPublic(pathname);
  if (!resolved) {
    sendErrorPage(response, 403);
    return;
  }

  if (fs.existsSync(resolved) && fs.statSync(resolved).isFile()) {
    sendFile(response, resolved);
    return;
  }

  if (fs.existsSync(resolved) && fs.statSync(resolved).isDirectory()) {
    if (!pathname.endsWith("/")) {
      response.writeHead(301, { Location: `${pathname}/${parsedUrl.search}` });
      response.end();
      return;
    }

    const directoryIndex = path.join(resolved, "index.html");
    if (fs.existsSync(directoryIndex)) {
      sendFile(response, directoryIndex);
      return;
    }
  }

  if (!path.extname(pathname)) {
    const directoryIndex = path.join(publicRoot, pathname.replace(/^\/+/, ""), "index.html");
    if (directoryIndex.startsWith(publicRoot) && fs.existsSync(directoryIndex)) {
      sendFile(response, directoryIndex);
      return;
    }
  }

  sendErrorPage(response, 404);
});

server.listen(port, bindHost, () => {
  process.stdout.write(`APES static preview listening on http://${bindHost}:${port}\n`);
});
