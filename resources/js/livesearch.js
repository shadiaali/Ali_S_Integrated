(function () {
    'use strict';

    let searchField = document.querySelector('.search-input'),
        resultList = document.querySelector('.result-list'),
        content;

    function showResults(e) {
        let srchString = e.currentTarget.value;
        resultList.innerHTML = '';

        if (srchString.length === 0) {

            return;
        }

        if (srchString != null) {
            let url = 'posts/search?str=' + srchString;

            srchString = srchString.trim().toLowerCase();

            fetch(url)
                .then(function (response) {
                    return response.json();

                }).then(function (data) {


                    if (data.length === 0) {
                        resultList.innerHTML = '<div class="column-small-12 py-2">No Such Posts Found</div>';
                    }

                    data.forEach(function (post) {
                        content = post.title;

                        resultList.innerHTML += content;
                    });

                }).catch(function (err) {
                    console.log(err);
                });
        }
    }

    if (searchField) {
        searchField.addEventListener('keyup', showResults, false);
    }
})();
