<?php

/************************************************************************
 * PLACES
 ************************************************************************
 * 1. How do we access the customer id and name to poulate the dropdown menu for places_edit.twig?
 * **********************************************************************
 * placesRoutes.php
 * PlacesService.php
 * places_edit.twig
 ************************************************************************
 * 2. ?
 * **********************************************************************
 * 
 * 
 * 
 * 
 */

        $query = "SELECT
                    places.id AS place_id,
                    places.name,
                    places.address,
                    places.suburb,
                    places.postcode,
                    tags.id as tag_id,
                    tags.short
                FROM
                    tags 
                INNER JOIN
                    places On places.tag_id = tags.id
                WHERE
                    places.customer_id = :id
                ORDER BY
                    places.name
                ";
//Had some issues with coding my variables. As Janusz advised don't 'copy the whole page and then edit it...' 'Work on each module/function at a time...' Had issues with authenticateCustomer() 
        
        
        
        
        
        
        
        