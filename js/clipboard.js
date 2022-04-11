    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        
        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "Copied Meeting ID: " + copyText.value;
    }

    function outFunc() {
        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "Click to copy";
    }