const request = require('@request');

describe('accounting companies', () => {
    let url = '/accounting/companies';

    test('Cargar Data formulario', async() => {

        let data = {
            'data_document_type': 1,
            'data_document_number': 654321498354,
            'name': 'Empresa 3',
            'trade_name': 'Empresa creado',
            'address': 'Jr 1234',
            'ubigeo': '011526',
            'data_entity_id': 64,
            'data_entity_name': 'company',
        };

        let { body, statusCode } = await request(url, 'POST', data);
        expect(statusCode).toEqual(200);
        expect(body.id).toBeDefined();
        expect(body.id).toMatch(/^[0-9a-f]{8}-[0-9a-f]{4}-[1-4][0-9a-f]{3}-[0-9a-f]{4}-[0-9a-f]{12}$/i);

    });

});