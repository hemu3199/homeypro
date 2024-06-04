 const search = () => {
    const searchbox = document.getElementById("search-item").value.toUpperCase();
    const storeitems = document.getElementById("property-list");
    const product = document.querySelectorAll(".dashboard-listings-item");
    const pname = storeitems.getElementsByTagName("h4");

    for (var i = 0; i < pname.length; i++) {
        let match = product[i].getElementsByTagName('h4')[0];
        if (match) {
            if (match.textContent.toUpperCase().indexOf(searchbox) > -1) {
                product[i].style.display = "";
            } else {
                product[i].style.display = "none";
            }
        }
    }
}


