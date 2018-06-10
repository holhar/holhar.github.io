$(document).ready(function() {

    /*
     * SKILLS SETUP
     */
    setProgressBar('js', 60);
    setProgressBar('java', 80);
    setProgressBar('misc', 75)

    $('.skills .btn').on('click', function(e) {
        e.preventDefault();
        $(this).find('i').toggleClass('fa-minus-square');
    });

    /*
     * MODAL SETUP
     */
    $('.microservices-link').on('click', function(e) {
        e.preventDefault();
        $('#microservices-modal').modal('show');
    });
    $('#microservices-thumbnail').on('click', function(e) {
        e.preventDefault();
        $('#microservices-modal').modal('show');
    });
    $('#websocket-thumbnail').on('click', function(e) {
        e.preventDefault();
        $('#websocket-modal').modal('show');
    });
    $('#webrtc-thumbnail').on('click', function(e) {
        e.preventDefault();
        $('#webrtc-modal').modal('show');
    });

    /*
     * GITHUB SETUP
     */
    GitHubActivity.feed({
        username: "holhar",
        //repository: "your-repo", // optional
        selector: "#feed",
        limit: 10 // optional
    });
});



/*
 * FUNCTIONS
 */
function setProgressBar(skill, progress) {
    var progressBar = $('.progress.' + skill).children('.progress-bar');
    $(progressBar).data('valuenow', progress);
    $(progressBar).attr('style', 'width:' + progress + '%');
    $(progressBar).html('<span class="sr-only">' + progress + '% Complete</span>');
}
