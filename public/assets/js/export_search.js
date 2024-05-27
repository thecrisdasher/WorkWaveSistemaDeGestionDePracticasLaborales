export class search {
    constructor(myurlp, mysearchp, ul_add_lip) {
        this.myurlp = myurlp;
        this.mysearch = document.querySelector('.buscador');
        this.ul_add_li = document.querySelector('#ul_add_li');
        this.ul_add_lip = ul_add_lip;
        this.idli = "mylist";
        this.pcantidad = document.querySelector('#pcantidad');
        console.log(this.mysearch);
    }

    InputSearch() {
        this.mysearch.addEventListener("input", (e) => {
            e.preventDefault();
            try {
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                let minimo_letras = 0;
                let valor = this.mysearch.value;
                if (valor.length > minimo_letras) {
                    let datasearch = new FormData();
                    datasearch.append("valor", valor);
                    fetch(this.myurlp, {
                        headers: {
                            "X-CSRF-TOKEN": token,
                        },
                        method: "post",
                        body: datasearch
                    })
                    .then((data) => data.json())
                    .then((data) => {
                        console.log(data);
                        this.Showlist(data, valor);
                    })
                    .catch(function (error) {
                        console.error("Error:", error);
                    });
                } else {
                    this.ul_add_lip.style.display = "none";
                }
            } catch (error) {
                console.log(error);
            }
        });
        this.mysearch.addEventListener("keyup", (e) => {
            if (this.mysearch.value === "") {
                this.hideList();
            }
        });
    }

    Showlist(data, valor) {
        this.ul_add_lip.style.display = "block";
        if (data.estado == 1) {
            if (data.result != "") {
                this.ul_add_lip.innerHTML = ""; // Limpiar contenido previo
                let arrayp = data.result;
                let n = 0;
                this.show_list_each_data(arrayp, valor, n);
                let adclasli = document.getElementById('1' + this.idli);
                adclasli.classList.add('selected');
            } else {
                this.ul_add_lip.innerHTML = `<li class="form-control buscador" style="position: relative">No se encontraron resultados</li>`;
            }
        }
    }

    hideList() {
        this.ul_add_lip.style.display = "none";
    }

    show_list_each_data(arrayp, valor, n) {
        for (let item of arrayp) {
            n++;
            let nombre = item.nombre_oferta;
            let urlOferta = `/oferta/${item.id_oferta}`; // Suponiendo que la URL de la oferta sigue este formato
            console.log(nombre);
            this.ul_add_lip.innerHTML += `
                <li id="${n + this.idli}" data-url="${urlOferta}" class="form-control buscador" style="position: relative; cursor: pointer;">
                    <div class="table align-items-center mb-0">
                        <div class="p-2">
                            <strong>${nombre.substr(0, valor.length)}</strong>
                            ${nombre.substr(valor.length)}
                        </div>
                    </div>
                </li>
            `;
        }
        this.addClickEventToResults();
    }

    addClickEventToResults() {
        let items = this.ul_add_lip.querySelectorAll('li');
        items.forEach(item => {
            item.addEventListener('click', () => {
                let url = item.getAttribute('data-url');
                window.location.href = url;
            });
        });
    }
}
