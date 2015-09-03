function validateSearch(searchString) {
    if ($(searchString).val() === "")  {
        //alert("Blank search");
        return false;
    }
    else {
        //alert("It's okay");
        return true;
    }
}