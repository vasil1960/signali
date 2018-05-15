$("#pod_id").select2({
  tags: true,
  multiple: true,
  tokenSeparators: [','],
  allowClear:true,
  multiple: false,
  minimumInputLength: 1,
  placeholder: "Избери местоположение на сигнала",
  minimumResultsForSearch: 50,
  language: "bg",
  ajax: {
      //url: "https://system.iag.bg/iag112new/php_scripts/podelenie_autocomplete.php",
      url: "/podelenie_autocomplete",
      dataType: "json",
      delay: 250,
      //type:'POST',
      data: function (params) {
        console.log(params)
          return {
              term: params.term
          };
      },
      processResults: function (data) {
          return {
              results: $.map(data, function (item) {
                  return {
                      id:       item.Pod_Id,
                      Glav_Pod: item.Glav_Pod,
                      text:     item.podelenie,
                      rdg:      item.rdg,
                      grad:     item.grad
                  }
              })
          };
    }
  },

  templateResult: formatRepo, // omitted for brevity, see the source of this page
  templateSelection: formatRepoSelection, // omitted for brevity, see the source of this page
  //dropdownCssClass: "bigdrop",
  escapeMarkup: function (markup) { return markup; } // let our custom formatter work
});

function formatRepo(repo)
{
  if (!repo.id) return repo.text;

  var html  = "";
  html += "<div>";
  html += "<span style='font-weight: bold; font-size: 110%; color: #434343'>" + repo.text + "</span>" + "<br>";
//                html += "";
  html += repo.rdg;
  html += ", ";
  html += repo.grad;
  html += "</div>";
  console.log(html)
  return html;
}

function formatRepoSelection(repo)
{
  var html  = "";
  html += repo.text;
//     html += "<span style='font-size:smaller'>" + ' - ' + 'общ. ' + repo.rdg  + ", обл. " +  repo.grad + "</span>";
  html += "";
  console.log(html)
  return html || repo.text
}
