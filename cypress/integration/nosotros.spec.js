/// <reference types="cypress" />

describe('Prueba la página de Nosotros', () => {
it('Prueba de Sección y Contenido', () => {
    cy.visit('/nosotros');

    cy.get('[data-cy="contenedor-seccion"]').should('exist');
    cy.get('[data-cy="contenedor-seccion"]').should('have.class', 'contenedor seccion');
    cy.get('[data-cy="contenedor-seccion"]').find('h1').invoke('text').should('equal', 'Conoce Sobre Nosotros');

    cy.get('[data-cy="contenido-nosotros"]').should('exist');
    cy.get('[data-cy="contenido-nosotros"]').should('have.class', 'contenido-nosotros');
    cy.get('[data-cy="contenido-nosotros"]').find('blockquote').invoke('text').should('equal', '25 Años de Experiencia');
    cy.get('[data-cy="imagen"]').should('exist');
    cy.get('[data-cy="imagen"]').should('have.class', 'imagen');
})

it('Prueba el Bloque de los Iconos', () => {

    cy.get('[data-cy="contenedor-seccion"]').should('exist');
    cy.get('[data-cy="contenedor-seccion"]').should('have.class', 'contenedor seccion');
    cy.get('[data-cy="contenedor-seccion"]').find('h2').invoke('text').should('equal', 'Más Sobre Nosotros');

    // Selecciona los Iconos
    cy.get('[data-cy="iconos-nosotros"]').should('exist');
    cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length', 3);
    cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('not.have.length', 4);
});
});