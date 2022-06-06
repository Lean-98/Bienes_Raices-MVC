/// <reference types="cypress" />

describe('Prueba la página de Blogs', () => {
    it('Prueba de Sección,h2 y imagen', () => {
        cy.visit('/blog');
    
        cy.get('[data-cy="contenedor-seccion-blog"]').should('exist');
        cy.get('[data-cy="contenedor-seccion-blog"]').should('have.class', 'contenedor seccion contenido-centrado');
        cy.get('[data-cy="contenedor-seccion-blog"]').find('h2').invoke('text').should('equal', 'Nuestro Blog');

        cy.get('[data-cy="entrada-blog"]').should('exist');
        cy.get('[data-cy="entrada-blog"]').should('have.class', 'entrada-blog');

        cy.get('[data-cy="imagen"]').should('exist');
        cy.get('[data-cy="imagen"]').should('have.class', 'imagen');
    });

     it('Prueba la Sección de Blogs', () => {
        
         // Debe haber 4 blogs
         cy.get('[data-cy="entrada-blog"]').should('have.length', 4);
         cy.get('[data-cy="entrada-blog"]').should('not.have.length', 8);

         // Probar el enlace en un blog
         cy.get('[data-cy="texto-entrada"]').should('exist');
         cy.get('[data-cy="texto-entrada"]').first().click();
         
         cy.wait(1000);
         cy.go('back');
     });
    
    });