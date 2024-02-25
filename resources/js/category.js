import $ from 'jquery';

$(document).ready(function(){
    let categories=[];
    let count=0;
    let pageTotal=0;
    let catCount = 0
    $.ajax({
        url: "https://the-trivia-api.com/api/categories",
        type: 'GET',
        dataType: 'json', 
        success: function(res) {
            categories = Object.keys(res)
            count = categories.length
            pageTotal = Math.ceil(count/6)
            appendCategories()
            appendPagination()
            $('.index .paginate .item').click(function(){
                if(catCount<pageTotal*6){
                    catCount = Number($(this).attr('data-id'))
                }
                appendCategories();
            });
        }
    })

    function appendPagination() {
        let element = $('.index .paginate');
        for (let i = 0; i < pageTotal; i++) {
            let div = $('<div></div>').addClass('bg-dark item rounded-circle mx-1 p-2 cursor-pointer').attr('data-id',i*6);
            element.append(div);
        }
    }
    function appendCategories() {
        let element = $('.index .categories-container');
        element.empty();
        for (let i = catCount; i < catCount+6; i++) {
            if(i<count){
                let div = $('<div></div>').addClass('col-6 p-3');
                let anchor = $('<a></a>').addClass('options text-decoration-none text-light rounded-pill p-3 w-100 d-block text-center').attr('href', '/category/'+categories[i]+'/1/0').text(categories[i]);
                div.append(anchor);
                element.append(div);
            }
           
        }
    }
})