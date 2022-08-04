const express = require('express');
const app = express();

app.get('/', function (req, res) {
    res.send('Workshop de Conteinerização');
});

const server = app.listen(process.env.PORT || 3000, () => {
    const address = server.address();
    console.log(
        'Aplicação subiu na porta http://%s:%s',
        (address.address === '::') ? '[::]' : address.address,
        address.port
    );
});
