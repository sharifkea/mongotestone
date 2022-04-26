$(document).ready(function() {
        // Get all from albums for dropdown
    $.ajax({
        type:"GET",
        url: "http://localhost/music-api-testing/album?title=",
        success: function(data){
            $.each(data.album, function (key, value) {
                $("#albumDrop").append($("<option>", {value: value.AlbumId, text: value.Title}));
            })

        }
    });


    // Get all from mediatypes for dropdown 
    $.ajax({
        type:"GET",
        url: "http://localhost/music-api-testing/mediatype",
        success: function(data){
            $.each(data.mediatype, function (key, value) {
                $("#mediaDrop").append($("<option>", {value: value.MediaTypeId, text: value.Name}));
            })

        }
    });

    // Get all from genres for dropdown 
    $.ajax({
        type:"GET",
        url: "http://localhost/music-api-testing/genre",
        success: function(data){
            $.each(data.genre, function (key, value) {
                $("#genreDrop").append($("<option>", {value: value.GenreId, text: value.Name}));
            })

        }
    });

    $(document).delegate('#addTrack', 'click', function(event) {
        event.preventDefault();
        
        let name = $('#name').val();
        let album = $('#albumDrowp').val();
        let mediaType = $('#mediaDrop').val();
        let genreId = $('#genreDrop').val();
        let composer = $('#composer').val();
        let milliseconds = $('#milliseconds').val();
        let bytes = $('#bytes').val();
        let unitPrice = $('#unitPrice').val();
        
        if(name == null || (name.trim().length === 0)) {
            alert("Track Name is required");
            return;      
        } else if (composer == null || (composer.trim().length === 0)){
            alert("Composer name is required");
            return;
        } else if(milliseconds == null || (milliseconds.trim().length === 0)){
            alert("Milliseconds is required");
            return
        } else if(bytes == null || (bytes.trim().length === 0)){
            alert("Size of file is required");
            return;
        } else if(unitPrice == null || (unitPrice.trim().length === 0)){
            alert("UnitPrice is required");
            return
        }

        const formData = $("#add_track").serialize();
        
        $.ajax({
            type: "POST",
            url: 'http://localhost/music-api-testing/track/new',
            data: formData,
            success: function(result) {
                console.log(formData);
                console.log(result)
                alert('New Track is Added.');
                window.location.href ='home.php';        },
            error: function(err) {
                alert(err);
                console.log("Error")
            }
        });
    });
}); 
