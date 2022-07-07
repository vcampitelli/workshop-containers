const express = require('express');
const app = express();

app.get('/', function (req, res) {
    res.send('Hello World');
});

const server = app.listen(process.env.PORT || 3000, () => {
    const address = server.address();
    console.log(
        'Example app listening at http://%s:%s',
        (address.address === '::') ? '[::]' : address.address,
        address.port
    );
});
