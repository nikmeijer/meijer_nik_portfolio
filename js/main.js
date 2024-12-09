(() => {
    //gsap scroll start
    gsap.registerPlugin(ScrollTrigger);

    //homepage
    const aboutme = document.querySelector("#aboutme");
    const proj1 = document.querySelector("#case-study1");
    const proj2 = document.querySelector("#case-study2");
    const proj3 = document.querySelector("#case-study3");
    const contact = document.querySelector("#contact");

    //case-study page
    const csimg = document.querySelectorAll(".cs-img");
    const cstext = document.querySelectorAll(".cs-text");

    gsap.set(aboutme, { opacity: 0, y: 100 });
    gsap.to(aboutme, {
        opacity: 1,
        y: 0,
        duration: .9,
        scrollTrigger: {
            trigger: aboutme,
            toggleActions: "play pause resume pause",
            start: 'top 80%',
            end: 'top 50%',
            scrub: true,
            markers: false,
        }

    });

    gsap.set(proj1, { opacity: 0, x: -100 });
    gsap.to(proj1, {
        opacity: 1,
        x: 0,
        duration: 1.5,
        scrollTrigger: {
            trigger: proj1,
            toggleActions: "play pause resume pause",
            start: 'top 80%',
            end: 'top 50%',
            scrub: true,
            markers: false,
        }

    });

    gsap.set(proj2, { opacity: 0, x: 100 });
    gsap.to(proj2, {
        opacity: 1,
        x: 0,
        duration: 1.5,

        scrollTrigger: {
            trigger: proj2,
            toggleActions: "play pause resume pause",
            start: 'top 80%',
            end: 'top 50%',
            scrub: true,
            markers: false,
        }

    });

    gsap.set(proj3, { opacity: 0, x: -100 });
    gsap.to(proj3, {
        opacity: 1,
        x: 0,
        duration: 1.5,

        scrollTrigger: {
            trigger: proj3,
            toggleActions: "play pause resume pause",
            start: 'top 80%',
            end: 'top 50%',
            scrub: true,
            markers: false,
        }

    });

    gsap.set(contact, { opacity: 0, y: 100 });
    gsap.to(contact, {
        opacity: 1,
        y: 0,
        duration: 1.3,
        scrollTrigger: {
            trigger: contact,
            toggleActions: "play pause resume pause",
            start: 'top 80%',
            end: 'top 50%',
            scrub: true,
            markers: false,
        }

    });

    csimg.forEach((img) => {
        gsap.set(img, { opacity: 0, y: 100 });
        gsap.to(img, {
            opacity: 1,
            y: 0,
            scrollTrigger: {
                trigger: img,
                toggleActions: "play none none none",
                start: 'top 80%',
                end: 'top 50%',
                scrub: true,
                markers: false,
            }

        });
    });

    cstext.forEach((p) => {
        gsap.set(p, { opacity: 0, x: -100 });
        gsap.to(p, {
            opacity: 1,
            x: 0,
            scrollTrigger: {
                trigger: p,
                toggleActions: "play none none none",
                start: 'top 80%',
                end: 'top 50%',
                scrub: true,
                markers: false,
            }

        });
    });

    //gsap scroll end

})();