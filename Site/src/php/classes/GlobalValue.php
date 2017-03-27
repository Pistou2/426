<?php

/*
*  ETML
*  Author : Merk Yann
*  Date : 27.03.2017
*  Summary :
*/


class GlobalValue
{
    const SITE_TITLE = "TODO";

    /*Array containing the name of the page, and the name of the php File linked to it, and the permission required to access it*/
    /*Permissions :
    0 : Everyone can access it
    1 : You need to be connected
    2 : You need to be connected and belong to the class or be the master of that class
    3 : You need to be connected and be the master of that class
    4 : You need to be connected and be the owner of that page (personal page, for i.e. students)
    42 : You need to be connected and be an Administrator
    */
    const PAGES_ARRAY = [["Accueil", "accueil", 1], ["Login", "login", 0]];
}