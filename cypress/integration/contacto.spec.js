/// <reference types="cypress" />

describe('Prueba el Formulario de Contacto', () => {
    it('Prueba la página de contacto y el envio de emails', () => {
        cy.visit('/contacto');

        cy.get('[data-cy="heading-contacto"]').should('exist');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal', 'Contacto');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('not.equal', 'Formulario de Contacto');

        cy.get('[data-cy="heading-formulario"]').should('exist');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal', 'Llene el Formulario de Contacto');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('not.equal', 'Llene el formulario');

        cy.get('[data-cy="formulario-contacto"]').should('exist');
    });

    it('Llena los campos del formulario', () => {

        cy.get('[data-cy="input-nombre"]').type('Leandro Vásquez');
        cy.get('[data-cy="input-mensaje"]').type('Donec rutrum arcu finibus sapien tristique rutrum. Maecenas in ligula eu ipsum elementum euismod nec in purus. In aliquet ac leo quis maximus. Proin vel quam enim.');
        cy.get('[data-cy="input-opciones"]').select('Compra');
        cy.get('[data-cy="input-precio"]').type('350000');
        cy.get('[data-cy="forma-contacto"]').eq(1).check();
        cy.get('[data-cy="input-email"]').type('ashdasjjsa@outlook.es');

        cy.wait(2000);

        cy.get('[data-cy="forma-contacto"]').eq(0).check();
        cy.get('[data-cy="input-telefono"]').type('03517003098');
        cy.get('[data-cy="input-fecha"]').type('2022-05-31');
        cy.get('[data-cy="input-hora"]').type('10:30');

        cy.get('[data-cy="formulario-contacto"]').submit();

        cy.get('[data-cy="alerta-envio-formulario"]').should('exist');
        cy.get('[data-cy="alerta-envio-formulario"]').invoke('text').should('equal', 'Mensaje Enviado Correctamente!');
        cy.get('[data-cy="alerta-envio-formulario"]').should('have.class', 'alerta').and('have.class', 'exito').and('not.have.class', 'error');

    });
})