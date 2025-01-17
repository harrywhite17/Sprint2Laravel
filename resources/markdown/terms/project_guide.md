# Project Guide

## Overview
Aquest projecte és una aplicació web per gestionar vídeos. Permet als usuaris crear, editar, veure i eliminar vídeos. També inclou funcionalitats per gestionar usuaris i equips.

## Sprint 1
Durant el primer sprint, hem realitzat les següents tasques:
- Configuració inicial del projecte.
- Creació de models per a `User`, `Team` i `Video`.
- Implementació de les funcionalitats bàsiques de creació i visualització de vídeos.
- Creació de proves unitàries per a la creació d'usuaris i vídeos per defecte.
- Crear el Test de Helpers.
- Al test s’ha de comprovar que es pugui crear l’usuari per defecte i el professor per defecte. Els camps han de ser el name, email i password. La password s’ha d’encriptar. Els usuaris s’han d’associar a un team.
- Crear helpers a la carpeta `app`.
- Crear a `config` les credencials dels usuaris i per defecte que agafi el fitxer `.env`.

## Sprint 2
Durant el segon sprint, hem realitzat les següents tasques:
- Corregir els errors del 1r sprint.
- Al fitxer `phpunit.xml`, descomentar les línies de `db_connection` i `db_database` per tal de que els testos utilitzi una base de dades temporal i no afecti a la base de dades real.
- Crear la migració amb els camps (id, title, description, url, published_at, previous, next, series_id).
- Controlador de vídeos, `VideosController` amb les funcions `testedBy` i `show`.
- Model de vídeos, el camp `published_at` ha de ser una data. Ha de tindre les següents funcions per a retornar la data en diferents formats que siguin llegibles per a l’usuari: `getFormattedPublishedAtAttribute` (retorna una data tipus "13 de gener de 2025"), `getFormattedForHumansPublishedAtAttribute` (retorna una data tipus "fa 2 hores") i `getPublishedAtTimestampAttribute` (retorna el valor Unix timestamp de `published_at`). S’ha d’utilitzar la llibreria Carbon per a manipular les dates i hores.
- Crear un helper de vídeos per defecte.
- Posar els usuaris i vídeos per defecte al `DatabaseSeeder`.
- Crear un layout que es digui `VideosAppLayout`, ha d’estar tant a `app/View/components` com a `resources/views/layouts`.
- Crear la ruta del `show` de vídeos.
- Crear la vista del `show` de vídeos.
- Posar el test `HelpersTest` a la carpeta `tests/Unit`.
- Afegir el test de la creació dels vídeos per defecte al fitxer `HelpersTest`.
- Crear el test `VideosTest` a la carpeta `tests/Unit`. Crear les funcions per comprovar la formatació del vídeo: `can_get_formatted_published_at_date()` i `can_get_formatted_published_at_date_when_not_published()`.
- Crear el test `VideosTest` a la carpeta `tests/Feature/Videos`. S’han de crear les funcions `users_can_view_videos()` i `users_cannot_view_not_existing_videos()`.
- Afegir a `resources/markdown/terms` una petita guia sobre que tracta el projecte i que hem fet als dos sprints.
- S’ha d’instal·lar i configurar el paquet Larastan, que és una eina per analitzar i detectar el codi en busca d’errors. Una vegada configurat, s’ha d’analitzar el codi en busca d’errors i corregir-los.