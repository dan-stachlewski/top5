<?php

/************************************************************************
 * PLACES
 ************************************************************************
 ************************************************************************
 * 3. How to display customer name so when the 1st register & login
 * There is a message [No places found for No Places found for {{ customer.username }}]
 * Files:
 * places_all.twig L51
 * **********************************************************************
 ************************************************************************
 * 2. Cannot get the Customer Menu to display Logout & Dashboard for some reason
 * Files: 
 * CustomersRoutes.php L84-124
 * layout.twig L83-104
 * 
 * **********************************************************************
 * 1. [DONE] How do we access the customer id and name to poulate the dropdown menu for places_edit.twig?
 * **********************************************************************
 * placesRoutes.php
 * PlacesService.php
 * places_edit.twig
 * 
 * 
 * 
 * 
 */


//Had some issues with coding my variables. As Janusz advised don't 'copy the whole page and then edit it...' 'Work on each module/function at a time...' Had issues with authenticateCustomer() 

/*        
Changes to make:
    Add the name to the endblock
    Change the Title Depending on the page using block title
    Use blocks to change images
   Use blocks to change the username... there is a twig function that can do that.

 
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
        
        
*/        
        
        
        