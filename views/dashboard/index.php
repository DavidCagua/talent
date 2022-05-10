<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
     <div >
        <form action="https://www.omdbapi.com/" method="GET" id="search-main">
            <h2>Panel de busqueda</h2>

            <p>
                <label for="searchByTitle">Busqueda por titulo</label>
                <input type="text" name="searchByTitle" id="searchByTitle">
            </p>
            <p>
                <label for="year">Año</label>
                <input type="text" name="year" id="year" >
            </p>
            <p>
                <label for="sort">Sort By:</label>

                <select name="sort" id="sort">
                  <option value="title">Title</option>
                  <option value="date">Date</option>
                  <option value="ascDesc">Asc/Desc</option>
                </select>
            </p>            
            <p>
                <input type="submit" value="Buscar" id="search-main__button"/>
            </p>

            <p>
            </p>
        </form>
    </div>
    <div id="results-main">

    </div>
    <Script>
      const $form = document.querySelector("#search-main");
      $form.addEventListener("submit", handleSubmit);
      function handleSubmit(event) {
        const $results = document.querySelector("#results-main");
        $results.innerHTML='';
        event.preventDefault();
        const form = new FormData(this);
        const title= this.searchByTitle.value;
        const year= this.year.value;
        const sort= this.sort.value;
        const response=fetch(`https://www.omdbapi.com/?s=${title}&y=${year}&apiKey=fc59da33`)
        .then((data)=>data.json())
        .then((res)=>{
          // console.log(res);
          const results=res.Search;
          for (let index = 0; index < results.length; index++) {
            const element = results[index];
            $results.innerHTML+=`
            <div class="results__card">
              <p>${element.Title}</p>
              <p>${element.Year}</p>
              <img src=${element.Poster} alt="MDN" >
            </div>
            
            `;
          }
        
        });
      };
    </Script>
</body>
</html>