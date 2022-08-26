
const map = document.querySelector('.map');

const clinicMap = {
  coordinats: [59.933000, 30.257058],
  zoom: 15,
  name: 'Белая медведица',
  schedule: 'До 21:00',
  rating: '4,7',
};

const initMap = () => {
  if (!map) {
    return;
  }
  let ymaps = window.ymaps;

  if (!ymaps) {
    return;
  }

  ymaps.ready(function () {
    const myMap = new ymaps.Map(map, {
      center: clinicMap.coordinats,
      zoom: clinicMap.zoom,
      controls: [],
      behaviors: ['multiTouch', 'scrollZoom'],
    },
    {
      balloonMaxWidth: 320,
    }
    );
    const breakpoint = window.matchMedia(`(min-width:960px)`);
    const breakpointChecker = () => {
      if (breakpoint.matches) {
        myMap.options.set('balloonPanelMaxMapArea', 0);
      } else {
        myMap.options.set('balloonPanelMaxMapArea', Infinity);
      }
    };
    breakpoint.addListener(breakpointChecker);

    breakpointChecker();

    if ((navigator.userAgent.match(/Android/i)
        || navigator.userAgent.match(/webOS/i)
        || navigator.userAgent.match(/iPhone/i)
        || navigator.userAgent.match(/iPad/i)
        || navigator.userAgent.match(/iPod/i)
        || navigator.userAgent.match(/BlackBerry/i)
        || navigator.userAgent.match(/Windows Phone/i))) {
      myMap.behaviors.disable('scrollZoom');
      myMap.behaviors.disable('drag');
    } else {
      myMap.behaviors.enable('drag');
    }

    const placemarkLayout = ymaps.templateLayoutFactory.createClass(
        `<div class="map__placemark">
          <img src="img/svg/clinic-marker.svg" width="60" height="68" alt="baloon">
          <div class="map__placemark-text">
            <div class="map__placemark-title">$[properties.placemarkHeader]</div>
              <span class="map__placemark-content" >$[properties.placemarkContent]
                <span class="map__placemark-rating">
                  <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8">
                    <path fill="#666" d="M3.992 6.566l1.818.948c.485.253.952-.083.86-.62l-.347-2.008c.003.02.01.002-.006.016L7.79 3.48c.392-.38.213-.925-.33-1.003L5.43 2.183c.02.003.005-.008.013.01L4.53.365c-.24-.487-.82-.487-1.06 0l-.91 1.828c.01-.018-.007-.007.013-.01L.54 2.477c-.542.078-.72.623-.33 1.002L1.684 4.9c-.015-.014-.01.004-.005-.016l-.348 2.01c-.092.534.375.87.86.62l1.818-.95c-.017.01.002.01-.016 0z"></path></svg>
                  $[properties.placemarkRating]
                  </span>
            </div>
          </div>`
    );

    ymaps.findOrganization('130760517096')
        .then(
            function (orgGeoObject) {
              orgGeoObject.properties.set({
                placemarkHeader: clinicMap.name,
                placemarkContent: clinicMap.schedule,
                placemarkRating: clinicMap.rating,
              });

              orgGeoObject.options.set({
                iconLayout: placemarkLayout,
                zIndex: 1,
                interactiveZIndex: true,
                // Описываем фигуру активной области "Круг".
                iconShape: {
                  type: 'Circle',
                  // Круг описывается в виде центра и радиуса
                  coordinates: [0, -30],
                  radius: 30,

                  panelMaxMapArea: Infinity,
                },
              });

              myMap.geoObjects.add(orgGeoObject);
              myMap.geoObjects.add('click', function () {
                orgGeoObject.balloon.open();
              });
            },
            function (err) {
              // обработка ошибок
              }
        );

    myMap.events.add('mousedown', () => {
      if (myMap.balloon.isOpen()) {
        myMap.balloon.close();
      }
    });
    myMap.events.add('touch', () => {
      if (myMap.balloon.isOpen()) {
        myMap.balloon.close();
      }
    });
  });
};

export {initMap};
