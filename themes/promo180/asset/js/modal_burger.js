let menuBurger = document.querySelector('.menu-burger');

let navMenu = document.querySelector('#nav');

menuBurger.addEventListener('click', function () {
    if (navMenu.style.display === "block") {
        navMenu.style.display = "none";
    } else {
        navMenu.style.display = "block";
    }
});


menuBurger.addEventListener('click', function () {
    console.log('cocucou');
});



// document.addEventListener("DOMContentLoaded", function () {
//     const colorInputs = document.querySelectorAll('input[type="color"]');

//     colorInputs.forEach(input => {
//         const id = input.id.replace("_color_picker", "");
//         const textInput = document.querySelector(`#${id}_color`);

//         input.addEventListener("input", () => {
//             textInput.value = input.value;
//         });

//         textInput.addEventListener("input", () => {
//             try {
//                 input.value = textInput.value;
//             } catch (e) {
//                 // Invalid color
//             }
//         });

//     })
// })

document.addEventListener("DOMContentLoaded", function () {
    const colorInputs = document.querySelectorAll('input[type="color"]');

    colorInputs.forEach(input => {
        const id = input.id.replace("_color_picker", "");
        const textInput = document.querySelector(`#${id}_color`);

        input.addEventListener("input", () => {
            textInput.value = input.value;
        });

        textInput.addEventListener("input", () => {
            try {
                input.value = textInput.value;
            } catch (e) {
                // Invalid color
            }
        });
    });
});
