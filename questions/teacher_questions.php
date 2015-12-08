 <?php

/************************************************************************
 * PLACES
 ************************************************************************
 ************************************************************************
 * 10. 
 * Files:
 * FormValidation.php L58
 * CustomerRoutes L 88, 121
 ************************************************************************
 ************************************************************************
 * 9. 
 * Files:
 * FormValidation.php L58
 * CustomerRoutes L 88, 121
 ************************************************************************
 ************************************************************************
 * 8. [DONE] Cannot preserve the value in the search text form - FIXED WITH JANUSZ HELP
 * Files:
 * search.twig L9
 * SearchrRoutes L 50-110
 ************************************************************************
  ************************************************************************
 * 7. [DONE] My validation rules are not changing depending on what I type in the search field - SORTED OUT MYSELF
 * Files:
 * search.twig L9
 * FormsValidation L 54-63
 ************************************************************************
 ************************************************************************
 * 6. Do we need to login before we can view the results for a search?
 * NO users who search don't need to be logged in.
 ************************************************************************
 * 5. [DONE] How to validate the drop down menu - DONE WORKED OUT MYSELF
 * Files:
 * FormValidation.php L58
 * CustomerRoutes L 88, 121
 ************************************************************************
 * 4. [DONE] How to make the title dynamic for each page - DONE W JANUSZ HELP
 * Files:
 * layout.twig L8
 * CustomerRoutes L 88, 121
 * **********************************************************************
 ************************************************************************
 * 3. [DONE] How to display customer name so when the 1st register & login  - DONE W JANUSZ HELP
 * There is a message [No places found for No Places found for {{ customer.username }}]
 * Files:
 * places_all.twig L51
 * **********************************************************************
 ************************************************************************
 * 2. [DONE] Cannot get the Customer Menu to display Logout & Dashboard for some reason  - DONE W JANUSZ HELP
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
        
        
        