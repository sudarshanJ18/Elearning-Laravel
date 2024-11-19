const { getDataConnect, validateArgs } = require('firebase/data-connect');

const connectorConfig = {
  connector: 'default',
  service: 'E-Learning-Laravel',
  location: 'us-central1'
};
exports.connectorConfig = connectorConfig;

