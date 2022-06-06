/// <reference types="cypress" />

describe('Prueba la página de Propiedades', () => {
    it('Prueba de Sección y h2', () => {
        cy.visit('/propiedades');
    
        cy.get('[data-cy="contenedor-seccion"]').should('exist');
        cy.get('[data-cy="contenedor-seccion"]').should('have.class', 'contenedor seccion');
        cy.get('[data-cy="contenedor-seccion"]').find('h2').invoke('text').should('equal', 'Casas y Departamentos en Venta');
    });

    it('Prueba la Sección de Propiedades', () => {
        
        // Debe haber 3 propiedades
        cy.get('[data-cy="anuncio"]').should('have.length', 6);
        cy.get('[data-cy="anuncio"]').should('not.have.length', 12);

        // Probar el enlace de las Propiedades
        cy.get('[data-cy="enlace-propiedad"]').should('have.class', 'boton-amarillo-block');
        cy.get('[data-cy="enlace-propiedad"]').should('not.have.class', 'boton-amarillo');

        cy.get('[data-cy="enlace-propiedad"]').first().invoke('text').should('equal', 'Ver Propiedad');

        // Probar el enlace en una propiedad
        cy.get('[data-cy="enlace-propiedad"]').first().click();
        cy.get('[data-cy="titulo-propiedad"]').should('exist');

        cy.wait(1000);
        cy.go('back');
    });
    
    });