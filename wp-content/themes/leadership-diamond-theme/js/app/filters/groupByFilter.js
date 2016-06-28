diamondApp.filter('groupBy', [
  '$parse'
 //'pmkr.filterStabilize', 
  function($parse) {

    function groupBy(input, prop) {

      if (!input) { return; }

      var grouped = {};

      input.forEach(function(item) {
        var key = $parse(prop)(item);
        grouped[key] = grouped[key] || [];
        grouped[key].push(item);
      });

      return grouped;

    }

    return filterStabilize(groupBy);

 }]);