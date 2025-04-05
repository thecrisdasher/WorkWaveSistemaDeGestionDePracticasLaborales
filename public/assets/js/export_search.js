export class search {
    constructor(myurlp, mysearchp, ul_add_lip) {
        this.myurlp = myurlp;
        this.mysearch = document.querySelector('.buscador');
        this.ul_add_li = document.querySelector('#ul_add_li');
        this.ul_add_lip = ul_add_lip;
        this.idli = "mylist";
        this.pcantidad = document.querySelector('#pcantidad');

        this.initEvents();
    }

    initEvents() {
        this.mysearch.addEventListener("input", (e) => this.handleInput(e));
        this.mysearch.addEventListener("keyup", () => this.hideListIfEmpty());
        document.addEventListener("click", (e) => this.handleClickOutside(e));
    }

    handleInput(e) {
        e.preventDefault();
        try {
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let minimo_letras = 1; // Cambia a 1 para evitar búsquedas con espacios vacíos
            let valor = this.mysearch.value.trim();

            if (valor.length >= minimo_letras) {
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
                    this.Showlist(data, valor);
                })
                .catch((error) => console.error("Error:", error));
            } else {
                this.hideList();
            }
        } catch (error) {
            console.log(error);
        }
    }

    hideListIfEmpty() {
        if (this.mysearch.value.trim() === "") {
            this.hideList();
        }
    }

    handleClickOutside(e) {
        if (!this.mysearch.contains(e.target) && !this.ul_add_lip.contains(e.target)) {
            this.hideList();
        }
    }

    Showlist(data, valor) {
        if (data.estado == 1) {
            this.ul_add_lip.style.display = data.result.length ? "grid" : "none";
            this.ul_add_lip.innerHTML = data.result.length
                ? data.result.map((item, index) => `
                    <li id="${index + 1}${this.idli}" data-url="/oferta/${item.id_oferta}" class="form-control buscador resuloferta" style="cursor: pointer;">
                        <div class="p-2">${item.nombre_oferta}</div>
                    </li>
                `).join("")
                : `<li class="form-control" style="position: relative">No se encontraron resultados</li>`;

            this.addClickEventToResults();
        }
    }

    hideList() {
        this.ul_add_lip.style.display = "none";
    }

    addClickEventToResults() {
        this.ul_add_lip.querySelectorAll('li').forEach(item => {
            item.addEventListener('click', () => {
                let url = item.getAttribute('data-url');
                window.location.href = url;
            });
        });
    }
}
