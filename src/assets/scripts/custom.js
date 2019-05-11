const doTooltipFunction = () => {
    const changeIten = (array, value = true) => {
        Array.from(array).forEach(iten => {
            iten.checked = value
        })
    }

    const changeModelItens = (event) => {
        const self = event.target
        if(self.checked){
            changeIten(allModels)
        }
        else {
            changeIten(allModels, false)
        }
    }

    const changeOptionItens = (event) => {
        const self = event.target
        if(self.checked) {
            changeIten(allOptions)
        }
        else {
            changeIten(allOptions, false)
        }
    }

    const changeEqualsOptions = op => {
        op.onchange = (event) => {
            const self = event.target
            if(self.checked){
                Array.from(allOptions).forEach(option => {
                    if(option.defaultValue == self.defaultValue)
                        option.checked = true
                })
            }
            else {
                Array.from(allOptions).forEach(option => {
                    if(option.defaultValue == self.defaultValue)
                        option.checked = false
                })
            }
        }
    }
    
    const models = document.getElementById("allModels")
    const allModels = document.getElementsByClassName("modelIten")
    models.onchange = changeModelItens

    const options = document.getElementById("allOptions")
    const allOptions = document.getElementsByClassName("optionIten")
    options.onchange = changeOptionItens

    const mainOptions = document.getElementsByClassName("mainOptions")
    Array.from(mainOptions).forEach(changeEqualsOptions)



    const div = document.getElementsByClassName("tooltip-box")
    const listItens = document.getElementsByClassName("tooltip-itens")
    Array.from(div).forEach((element, index) => {
        const iten = element.lastElementChild
        const text = element.firstElementChild.lastElementChild
        text.onclick = () => {
            if(iten.style.display == 'none'){
                Array.from(listItens).forEach((ele) => {
                    ele.style.display = "none"
                })
                iten.style.display = "flex"
            }
            else{
                iten.style.display = "none"
            }
        }
    })
}