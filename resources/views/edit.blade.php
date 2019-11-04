

        <form method="POST" v-on:submit.prevent="updatekeep(fillkeep.folio)">
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="edit">
<div class="modal-dialog modal-xl" role="document">
    
        <div class="modal-content p-2">
        <div class="col-xs-2" style="text-align:right">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <div class="col-xs-2" style="text-align:left">
        <h2 class="display-4" style="display:inline-block">Detalles De Prestamos</h2>
        
       
        
        <h5 class="font-weight-light">Libros Prestados A xHector PalominoX Con Folio Numero x333x</h5>


<h5 class="font-weight-light text-danger">Estado: xVigentex</h5>

<hr>
<nav class="navbar navbar-light bg-light">





<div class="card mb-3" style="max-width: 520px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="data:image/jpeg;base64,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" class="card-img">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h4 class="card-title text-size">xCienciasLocas1x</h4>

        <div class="row">
        <div class="col-sm-5 font-weight-bold"><p class="card-text">Fecha Inicial</p></div>
        <div class="col-sm-5 font-weight-bold"><p class="card-text">Fecha Final</p></div>  
        </div>
        
        <div class="row">
        <div class="col-sm-5"><p class="card-text">x2019-12-12x</p></div>
        <div class="col-sm-5"><p class="card-text">x2019-12-14x</p></div>  
        </div> 
        
        
        <br/>
        <br/>
        <p class="card-text"><small class="text-muted">Folio Numero: x333x</small></p>
        <p class="card-text"><small class="text-muted">codigo Libro: x234324324234324x</small></p>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3" style="max-width: 520px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxISEhUSEhIVFhUXFxUXFhUXFRUWFxUVFxUWFxcVFRcYHSggGB0lGxcVIjEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OFxAQFy0eHR0tLS0tLS0tLS0tKy0tLS0tLS0tKy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0rLf/AABEIAKsBJwMBIgACEQEDEQH/xAAcAAACAwEBAQEAAAAAAAAAAAADBAIFBgEHAAj/xAA8EAABAwIDBgQEAwgCAgMAAAABAAIRAyEEEjEFBkFRYXEigZGhEzKx8ELB0QcjUmJyguHxFBWSsjODov/EABkBAQADAQEAAAAAAAAAAAAAAAABAgMEBf/EACARAQEBAQACAgMBAQAAAAAAAAABAhEDIRIxIkFRMhP/2gAMAwEAAhEDEQA/AM21qIGqQaiNapQgGqbWIjWqYaggGKTWIgapGBr/AL7IK3eAluGqlpg5TeYibH2JXmxaTwt9Fr98cYTLBIDY6zUscvYMdJPMtErHgIJtp8zf79FJ9IqVNg5X7p5uHcWzl7eXCxUdTwmxnhMf57ddShMHH2/NWBwk3HHnwUXYB4MR/vknTgmAdBnVuh58I94RMXRBuIDTJA5Rcjy/NTwGEMxoeR5/f3z0GF2H8enLZzNuW6i5uB6qtvFpnrMsogAmbxpyMSB6j3UnUcrpaYB5+9h0Wgq7FLS9wGphvUkgW9D9lJYnZ5ay5tNhc24CwT5HxsV9ZmaCJECcxF3E8R+vuqapSM8/vQK3YTm6DWeXbl9dFGtiGiMolwBk2sTyHMD7srKKyphHiJGs/wD5+b0QXNIV/RbmYAHAZZlxMC9+Njefu4p67TcxbnwPrqgEBOpA6mYPoJU8JiDTe17TdpkRZQpaidDY9Oqg4QY8kHreBxDarczeTTHRwkHt1RyxZzcPF52Opk3YGx/QS6B5HN5QtSWqQsWKJYmi1RLUChYolqaLVAtQLFiG5iZLVBzUCpaoFqZLUMtRBdzUMhMOahuCABCiQikKJCARC6pEL5BZNaitauNCK0Il8GqbWqTQpgII8J4L5jY8TuXoOSm8W8x9Qh4+S34bbOeCJ/hb+Jx9QB1I6oPOdp7QzNkXNS7uknOQ3lchv/1dVWNoH8x25pmowyA5sEDK63EOI4Hy8lY4ajyaSAQJJiD5fSyhJ3dbZAe4F/kP8L0Fm7zHfpzWe2CwtIsPJb7Ambrk8mra9Dx4kyoDuU2ZZIPEG4UqW5d4eA79ORHH78trST2HaJuFWav9LjP8ZLDbj0m+IDuPLhPL7tZW2C3ZYzQRrBEjnp98eq0tBoTMBaSdZa9MxW2BTcxoI8QmHW42k9hKy28e6DyJa484tDZPQTytYL091MIdSmIU84j1X55xu6Ne+gGscfPqqmpu7WbYtPofsr9H4jCtIu0eip9obMY60D0F1W+XUWnhzXg1XYT2ibeWo9dPJV1UBpy5SDxJvP6eS9j2ts2JAFl5xvHhgx0x26EXjsfqr+Py/K8qnl8HxnYoMNSaKgdBAaQ5zReGggkt59kniGgOIFhJHYgkemissLVIcSOoHSSkNo0cr7aOa147PE/WfRbuU/uvVLa+XO5hIIlvHKCS0jTQHhwXqAkm/TjxvfReQYWuWPp1QbhzTPVpGvlHqvYKFQOg9J9bR9R5KRKFEhGhRLUASFAtRyFAhAu5qG5qYc1DcEC7ghuCZcEJwQLkIbmphwQnBAAhQIRiFAhEAkL5SIXyC2aERoUGhGaESk0IjQotCK0IIuiDOkGe3FUYNWuHGm7I02NW2cgSBTpcgJMvj5iY5p/a4+Jlw4mKn/yEfhpC7u2b5fMpvEOFOkS1k5QMrBbTQCBr08kHm2MwXwqzgNO5cWjU37j31R6OJLYbOnCBHlz7pCri3Oe9zj8znGOAJNo+nZRw77ydZ+woqY3eyK5JaSt3s48F59sZxGRegbMIgdlw7+3pY/yvsMLqwphV2HOismCyiGh6YKYYUmwmU3TK0lZagjioZl84rjSFbqvA67VWYklWdRVuJbKy22wo9ptlpXmm/FEGlmAuDK9Q2hZq8+3np5qDxykquLzUX3O4seaU3xm62ChjHSKfSm0e7kK/mvqov2gei9B5aYA+EeYqD0c0z/6hb/dHagdhXZz4qYy/1N0ZHMyY5zHNedTbz+/qtBubiHNrBrQ2SbOdo0uGXSCdcukHUTexD0uvMNH4i5nsQ53sCjEIGApkgueQ6pJaSLNAB0YPwg2J1M6kwIbcFIAQoFqMQoEIAOahuCYcENwQLuCE4I7kNwQAcEJwTDghOCABCG4IxCg4IAELqk4LiIWrQitQ2orUSI1FaENqI1AjQE1nPPMsHYDT1a4/3JnF/LPX87e8IDmkE8AXOkxOV2bM1xHK4n/aX2pjA2i55JDQQHAa5v4WnmeB46oMBtjDFlZ7YESSNYAJmB2uI6JRjrgdfadE3jc9So6ReYgc+In7ulabfGByI+uihPG62LTmOkL0HZzQGgjp9Fhdhi8Lc7OxNM5W5gTw7Li3Pb0cX0vcIrOkVV0m8jZN0al1ETfaxa1MtSdKvwhGFWVpLGNlHIUSUMVEN1VT1HxcrGyQeJTFV82myTxGKpsHicB3Kzs61npX4ynIhYDeqQHt4QVqMZvVhc/w/iAHSbRPKeKy28WJZUDiCC0hwkGbx0VZmyr/ACnHmFVmR8nhoDxOgJ7a+iUc2FabawxaGOOpEnoRZzfIpLCYfOTLgIE913S+nnXP5cKyrTdlubFUWwCDUYCCAQWghxt5fVV9WnB6K43MwvxMUwZ3MIDiC2M0xFpBFpJuNGlSq9bdDRyA9gAviEGhgiDL6r6mkAhoaCOMAST3JFhACYIUoCIUCEYhQIQBcENwRnBQcEC7ghOCYcENwQLuCE4I7ghuCBdwQ3BHcENwQAcF8puC+QWTERqExGagKwIjQoNRWoBV2keJonmOPcc+36Qc5vOxhyfDAByue4tEE5QGtDuzn6FaxZ3eKzaroEtpmP8Aya6/mQoGGaS/KGuIDGN7kl2Zxn+pxv0CJhqJFdubUmTPsfqj7uUQ+qWmPEIA5mQbeidxGHjE3Fx00iRCpb742znuZTGLYJAJIEe6XpCtSdmpuMdDr5haP/q/iNzRP6KmqbvVX1GtzFrXGIBjrAWc1Gms03S33xVI+K/cf5Vrgv2nvmH0v7hKod5ty6tGq00aT6lNwsWtFRwluWHB3ymbgxx1lMHcCtRoMe6fjG5ptBcQDwOXirXOVc713j0fZG+FKqJBjutJgscKgsV4ph928Y0B+VzY1BBBOnOJXr25VFjqLXZYOhEmZGqws9+nR317G2htZtL5jCw+3t+alN8UG5o62J/RbTe7Dh1I02tlzrDp1WGf+z+s5ubPMm7QctuN+anP37Lyxl8fv/jXHxOZT6Zh76oTMU/EAf8AJxtJjTcAvMkaW0stps3cTDBlSlWs57coeY8NtRw163hUuyv2chtVjsRWoOpUrjI97jVhxIlrjDbkWHARE3Ws5xhqa7z7V2N2bhQwfCrMqm0kQZPQCyV2dg3BzRlsXSbcri3QgLR4fcunUxD30MwaDygZjyjQaLQf9KKRYXazEnq0/mAPNZ621mP3Xne92zoaG8zmb0J+dv0PmVmsNgy4EgeNkeDmPxA+y9D3yw+ZhHETHe33Ky2ysCWXf4RZ3xOhvrwMRrY+cK+NfirvHdsvjXNkZeVwdQZNirvcjDO/5mHeBYmp6Cm8Eqq2nUzPL4+aSP6TIaSBxywVrf2dVs1S4H7uk5o65nB35LeOS/b0CVyF1rwdPPvy7r4qUBkKJCIQokIBOCE4I5CG4IAOQ3BHcEJwQAcEJwR3BDcEAHBDcEZwQ3BABwXyk4L5A81FYhNRWIDNRWoTEVoQScLFUe8VZhpmeIDXt4gOMB39IfkvpqrypMGNYt9lVO28Cx+HrfDHiyPItJLg065uJ0PHmgwVCt8CtTLmua5j3PsLukNyDt+pWh2w4Gq2oD4XeIEHUOm3kfoktqbPhrXAAujI4udALXsBY5snwkZhp/Fe1yxh2h9DMDHhBA6wCY5LPc9ytvFeyxr918QHWPJaDa+xhUpy0XF5GojiFg93MbkqX7HovU9lYoFoBMhc2vVdU9zrM4YYoDLnIH3zV5s6k7MC8lx63jtyVt/wWEyEZmGa1O1PYWxlMEX5FfbrviW/zE2QtpVgOK7u80h08ynfZ8fxpnaj/wB8J4T9E5QYHCOKU20yXh0cl3Z2KBMKO80fHuYliKJm90j/ANQxxnLr3WiEFRcAFezqk1SGC2e2k2whZ3ex4LCJg8CNQRcH1ur7aOOyhef7w7RLibrO39RpjP7rKbfxNQtPxS3gJaCM2nooYmu1rPhmQSKdNrbECcrTmOvyyg4lxqEkHQ6czwUN5WRR+K0wQ5pmdSSJ9itpPqM7e/KsriySS8N8GYtHhsP4Wg84Eqy3Px7KNdpqHIC6C6coDC1wdJkH5vhnsCqfP4fxcXWPEWFtI9xJV1hdjGpQbXNUNp/Ee18C9MzlFR0m4OanNhaOV+hxPSsFjqb3EUjIIadCBqQ5wJ1BAAkWkJ7j6/ks3sUupUQ80XEnVzHOrZyNWvafGHtOZvhBFvJWNDbdJ3yB5JA8JApwezyCpQsyoFQoZzd8Dk1smO7iAT6DzRCggUNyKQoFABwQyEdwQnBAFwQnBHcEJwQBcEJwR3BCcEAHBfKTl8gZaUViCxFaUB2FGagNKM0oChfOpg3i/PQ+ouuAqYQY3bRdTpPw8NMnJTLoytaHB1MydHsa4AHiC3+EpLBuyPqUCWl1MxaAHCJlsc9Y6rUb0Uf3D3XLR8MvgwQ1lRr84PAgZtLwegWB2ngXsL6rTenUc2oc1wXPJpuLTwc0iCJB6QVXU7F8a+N6uKNTI63f9Vud3dozAJXmuzcS6q1znEZmn2I/36LTbEqkFYeTLp8W3rGCxQhM1K1plZvZdS2qs/jAwFi34rq7i4PngbdgAZ9VodjuEAcV5vvZtarh62amJaRceyud29+MO5gNR4Y4agq0l+0Wy+m52tEKiw5hwg3n1F1nd5/2i0gyKRzvOgHJKbi1sXiawq1hlptuG8yNJ7JrNt6jOpJz9vTMPiZ78ei7WxEKvrVIMjigVsTZV6mSENu4yAYWB2y50E/d1qtqPzFZLanjcGNE/fXRMz2nV5FTSNNgaHmBma5xmARYge3uqfb+1G13fCpkZM0l3C3LpqfRH3kGjDpJOnARCzdVp5QLQOh0n0XVnPfbj35LJcx3KHvytgAkAE2HLMeSt9iYquBUoU4OdrszJF3Nb+GeNhpBsI0VP8OBmGmhHI9eiJhaxY7NxF+Wl/IrRg9G3YfFOIf8zsoaRl+G+o+MpdEXa4TPALU0yQ28ADgDMAeQHosDsXGgupVC0U2Bt3EEBxDvC4/hIBBuTrymRuKNRrwIe0t6Oa4u6uItrqB9LKQxKgVLMDoQexlRKDhUCpFQKCDkNyIVByATghOCM5DcgC4ITgjOQnIAvC+UnBfIJtRGlBaUQFAw1FaUu0orSgYBUwUFpUwUBHsDmlrrgggjmCIK8/23hHl7B8KfgAUiWsDhIJcKlVoBc5pplpAA1L7grfMcq7aoFJ7cToBDKv8AQZyv7sLiezndEGB2TDcQ5kgg8QDBIggw4dePNaLBCHe55RzUd/MI1jqWJAGaQ138wEmY9p6hQwlcHxCI6eoKy3G3jra7GryI4omN2lkJA1A14DnKrthvEzqLX+nqqnezF/De+5zGLX7zpwH16rDOe1063zJjaONFWW6zaZmJj9fqsbtHZVSZaDHbWeCew21aV3VXHy1734rQbK3j2e6GVSf6p17jyC1n4sefJTbt7DAOeoCekGRrw8itphtqmm0BoHi0gyQ3vz/XjCRxO8uzqctpgvJ1cOd+HHzVLjdpU3gfDFWYIEU3WtAi33JUX39rzFn02NDeLMDN9J/lHDVXjX+DNMiOC8twHx2O8dJ4DhadY1mNeGmq9JwVVpogCAIt16hZ7z/Fsav7VW1K4g+az3xA1rzrH1P1/JWW03SY4En27np7rLbXxZDQGixmDwkC4lMZN6VO035szrwxovpOYz991Q4yqXHSIA+gV9tHCuGFLj+N4vJveB+fsq7aeEy1LCZba/Lj6LozXNuXiuY60R5/UHmFIubEFsHnMDzEJ9uz3fDDgTlfExpImJHcn1SVOgC4NGl7/mrS9UubPtqNyNq/DeKRiDqSCZuRAvydP9p5renZlMfLLe2Ut/8ABwLR/aAvMNm4cUnteJMHXobER2laupvZVBkMZlOjbz5u/wAKyrTsouH4xHIMAP1I9kWFRYPemm4HPTewjs4H+k/4RHbyUh+F/o2/ugt3KBSdDbNB5gPAPJ3hPujtxDXEhrmkjUAglBMobipEqDigg4obipkobigg5DcpOKG4oIuXy+K4gi0ojSgMKI0oGGuRGuQGlcr4lrBLjH1PYIHWlSLwNTHdZzE7Ve4Qzwj3++yqqzC65Mnrc+puh1tXVqbrZ2zwhwkdoKT2jtKmxpzVxEfKA1zneQsPMQsVVaWm4kH26pfENhBDG4wuhpLsgEAEyYBOUEnUgGJAHbmbYmLg5D1gnskHU1ENi/JRZ1MvHoGyNqhhE+fTS587q3OzqeIPxHmZsBMDh+i89weLJgkwQYM6d+a1WztpQA22U9ePNYazz6dONy/ZyvToUn/vaLHDg/KJHQoztpbMA/eU2mOTAfyRauDc9tzIPDVLU9zWOMmBP3dVmv62vf0Zob2bLpWZRjsyPyTOH3mp1TlpNjuOCFT3KoiMwaQO6bobCbS+QRwTVnEZt77P02McBmAJ6iYPPolcbWFJtrN76fp5rlYfDEuN+XFZfbW0JDpn+XoQbgkWP+FTMqd6gW0NryCf5TMxp09ln8Mx1VwPYCePVKGoXvgStRsXCBgBMToFtfxjGflTW09nipR+ENYGU8naz6hY7aeQlmfMMstc0RmaYuATwkW6L0FzSBPp5rHbyUJq08jQXuMdzwuq+O+1/NPx65h9mmphWwL3EnKBGbWwlxjqqqnQhx1kkgHppZardpobhyXicpeYkwCCbZZjVVVOl41rj7rn8v1l98CIEcFKpQmByum3CbqJ1WjEOnSj80vWOYkckw910nVqZnFrfM8v8oJzJt68fVGojKJ4zr04j76LtGjGg++qLb/Wnqgtdn7Sc2z/ABN5zLh3Vw14IkGQeKyAeZkCDwj8+aYw2NqMNjbi3h/hBpiUJxSNLbDDZ0tPW49Qmy5EuOKGVJxQyUESV1QcV1AFpRA5LZlE4kIG6tcNE+g5qkrFzzmcRPfQcgjVDmMklfNoNOjSgAGkaR6/fVcc13JOswIOtvOSrLB7Pa38M97ql3ItPHazwpl2gJ8kU7HBF3xygTCu8fiL5BoNe6SzyrS9iupy+lczYTeLz5AD6oVfd4/gqD+4Ee4lW4epOcpQzZ2LXYflDh/KZ+sFHw2JLJY4ZTPGQQr/ADQovg6gHuJ9FFnVprh/Yu3BGV2n07lW42w06LNNALbAeir8VtA0y0ASCJg94McllfH/ABtnzfqt83azYkut+aXdti9j2979lgv+5/l0QKu1nuJIt04KPhVv+safbu15F3XmbewHVZDG411Uxw4cEN5c83vy+ibw2GhXkkUtuhdk4LiQtZs+nHZU+CbCvKJgLPXttj1BMY9YXbdRj6wDiQ0A3Am/aRxWrx9axWQrB2Z7g0OAFyRIbNp6aqfHPavm164e2fXy0AwCM366+alhfmnkpVmZGMbq4NEnrw/Ndpthq0zP2w8l9yfwQuUXgx3+i4HIlUwI4lXZk6oJ8LfM8uv6L6jSDQAB5lHywIHHXr1KjMd0HchOp+/yXxACiXkrgbzQdNU9lxTAAX2YckAyCm8Biiwwfl5cuoS+boolBoi5DLkjs/ESMp8v0TRKJdJXyGSvkCIaXfqUZmGHUolEWnipZlS1eSIij0CKyl5LrAjNCqsJSLW6ItbEZWl3p34IICW2m6zQok7S65CDnlfAri4dFsxElTzITNF8UDGZclDavuCDtJ8HogHCteINiCQD5rp1RGG58kFTW2e9p0kcwl201oKh07pPE0wHWCirT2Vo0U9RprlIJ6g0LO1tIYwrIT0wEtTKm7RUX6Ux77FZlrGuPzG7gC0Tcc5V/tE+F3ZVOQA0yBcsk95Kvlnu+4YqOzGfIff3qiPCHRGnkpO4LRjb0SnYdSov5qbkJylAZK+AXV0oOLi6V8g4urrV8UHFwr5dCD5joMqzD5EqrTuHPhQFLl8huXUH/9k=" class="card-img">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h4 class="card-title text-size">xCienciasLocas1x</h4>

        <div class="row">
        <div class="col-sm-5 font-weight-bold"><p class="card-text">Fecha Inicial</p></div>
        <div class="col-sm-5 font-weight-bold"><p class="card-text">Fecha Final</p></div>  
        </div>
        
        <div class="row">
        <div class="col-sm-5"><p class="card-text">x2019-12-12x</p></div>
        <div class="col-sm-5"><p class="card-text">x2019-12-14x</p></div>  
        </div> 
        
        
        <br/>
        <br/>
        <p class="card-text"><small class="text-muted">Folio Numero: x333x</small></p>
        <p class="card-text"><small class="text-muted">codigo Libro: x234324324234324x</small></p>
      </div>
    </div>
  </div>
</div>


<div class="card mb-3" style="max-width: 520px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="https://www.ecured.cu/images/f/f8/9789590701597.jpg" class="card-img">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h4 class="card-title text-size">xCienciasLocas1x</h4>

        <div class="row">
        <div class="col-sm-5 font-weight-bold"><p class="card-text">Fecha Inicial</p></div>
        <div class="col-sm-5 font-weight-bold"><p class="card-text">Fecha Final</p></div>  
        </div>
        
        <div class="row">
        <div class="col-sm-5"><p class="card-text">x2019-12-12x</p></div>
        <div class="col-sm-5"><p class="card-text">x2019-12-14x</p></div>  
        </div> 
        
        
        <br/>
        <br/>
        <p class="card-text"><small class="text-muted">Folio Numero: x333x</small></p>
        <p class="card-text"><small class="text-muted">codigo Libro: x234324324234324x</small></p>
      </div>
    </div>
  </div>
</div>

		  



            

        </div>
    </div>
</div>
</form>
        

        
        
</div>







<!--

<form method="POST" v-on:submit.prevent="updatekeep(fillkeep.folio)">
<div class="modal fade" tabindex="-1" role="dialog" id="edit">
<div class="modal-dialog" role="document">
        <div class="modal-content">


            <div class="modal-header">
            <h5 class="modal-title">Editar Tarea</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">
                <label for="renovaciones">crear tarea</label>
                <input type="text" name="renovaciones" class="form-control" v-model="fillkeep.renovaciones">
                <span v-for="error in errors" class="text-danger">@{{error}}</span>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary"  value="Actualizar">
            </div>
        </div>
    </div>
</div>
</form>

-->