import http from 'http'

http.createServer((req, res) => {
    res.writeHead(200, { 'Content-Type': 'text/html; charset=utf-8'});
    res.write('Chúc bạn thành công với Nodejs nha!!!');
    res.end();
}).listen(8080);