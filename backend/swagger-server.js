const express = require('express');
const cors = require('cors');
const swaggerJsDoc = require('swagger-jsdoc');
const path = require('path');

const app = express();
const PORT = 3002;

app.use(cors());

const swaggerOptions = {
  swaggerDefinition: {
    openapi: '3.0.0',
    info: {
      title: 'Laboratorio API',
      version: '1.0.0',
      description: 'API del sistema de laboratorio médico'
    },
    servers: [{ url: 'http://localhost:3001' }]
  },
  apis: ['./routes/*.js']
};

const swaggerDocs = swaggerJsDoc(swaggerOptions);

app.use(express.static(path.join(__dirname, 'node_modules/swagger-ui-dist')));

app.get('/', (req, res) => {
  res.send(`
    <!DOCTYPE html>
    <html>
    <head>
      <link rel="stylesheet" type="text/css" href="/swagger-ui.css">
      <title>Laboratorio API</title>
    </head>
    <body>
      <div id="swagger-ui"></div>
      <script src="/swagger-ui-bundle.js"></script>
      <script src="/swagger-ui-standalone-preset.js"></script>
      <script>
        window.onload = () => {
          window.ui = SwaggerUIBundle({
            url: '/api.json',
            dom_id: '#swagger-ui',
            deepLinking: true,
            presets: [SwaggerUIBundle.presets.apis, SwaggerUIBundle.SwaggerUIStandalonePreset]
          });
        };
      </script>
    </body>
    </html>
  `);
});

app.get('/api.json', (req, res) => res.json(swaggerDocs));

app.listen(PORT, () => console.log(`Swagger en http://localhost:${PORT}`));
