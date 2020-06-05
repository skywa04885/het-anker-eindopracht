-- Uses the database
use `anker`;

-- Inserts the activities
INSERT INTO `activities` (`a_name`, `a_desc`, `a_location`, `a_start_time`, `a_end_time`, `a_max`, `a_used`, `a_deadline`, `a_image`)
VALUES ('DJ Workshop', 'Maak uw eigen muziek en de voetjes gaan van de vloer tijdens uw uitje met deze fantastische DJ workshop. Leer gebruik te maken van een DJ mixer, monitor en koptelefoon. Daarnaast staan het werken met pitch control en cue points en het live mixen centraal! Onder begeleiding van een ervaren DJ gaan jullie in deze workshop werken aan jullie muzikale vaardigheden. Te beginnen met een stukje theorie over de basistechnieken en dan natuurlijk snel zelf aan de slag.',
        'Nijmegen', '10:00:00', '12:00:00', 15, 0, '21-06-19', '/media/activities/002-dj-workshop.jpg');

INSERT INTO `activities` (`a_name`, `a_desc`, `a_location`, `a_start_time`, `a_end_time`, `a_max`, `a_used`, `a_deadline`, `a_image`)
VALUES ('DJ Workshop', 'Maak uw eigen muziek en de voetjes gaan van de vloer tijdens uw uitje met deze fantastische DJ workshop. Leer gebruik te maken van een DJ mixer, monitor en koptelefoon. Daarnaast staan het werken met pitch control en cue points en het live mixen centraal! Onder begeleiding van een ervaren DJ gaan jullie in deze workshop werken aan jullie muzikale vaardigheden. Te beginnen met een stukje theorie over de basistechnieken en dan natuurlijk snel zelf aan de slag.',
        'Nijmegen', '13:00:00', '15:00:00', 15, 0, '21-06-19', '/media/activities/002-dj-workshop.jpg');

INSERT INTO `activities` (`a_name`, `a_desc`, `a_location`, `a_start_time`, `a_end_time`, `a_max`, `a_used`, `a_deadline`, `a_image`)
VALUES ('Graffiti Workshop', 'Verken de wereld van street-art met deze fantastische Graffiti-workshop. Deze workshop is ideaal om te gebruiken als ontspanning, teambuilding en zelfs voor trainingsdoeleinden. Jullie kunnen een eigen thema voorstellen waarmee de deelnemers aan de slag kunnen gaan. Denk aan een nieuw logo voor het bedrijf of het levensverhaal van de vrijgezel.',
        'Arnhem', '00:09:00', '11:00:00', 10, 0, '20-06-19', '/media/activities/003-graffiti.jpg');

INSERT INTO `activities` (`a_name`, `a_desc`, `a_location`, `a_start_time`, `a_end_time`, `a_max`, `a_used`, `a_deadline`, `a_image`)
VALUES ('Graffiti Workshop', 'Verken de wereld van street-art met deze fantastische Graffiti-workshop. Deze workshop is ideaal om te gebruiken als ontspanning, teambuilding en zelfs voor trainingsdoeleinden. Jullie kunnen een eigen thema voorstellen waarmee de deelnemers aan de slag kunnen gaan. Denk aan een nieuw logo voor het bedrijf of het levensverhaal van de vrijgezel.',
        'Arnhem', '13:00:00', '15:00:00', 10, 0, '20-06-19', '/media/activities/003-graffiti.jpg');

INSERT INTO `activities` (`a_name`, `a_desc`, `a_location`, `a_start_time`, `a_end_time`, `a_max`, `a_used`, `a_deadline`, `a_image`)
VALUES ('Kitebuggyen', 'Met grote snelheid over het strand racen, voortgetrokken door speciale kitebuggyvliegers die het voor iedereen mogelijk maken om te kitebuggyen. De activiteit begint bij ons altijd met een kite workshop waarin u de kite leert besturen, leert stoppen en de juiste krachten leert krijgen. Als u de kite onder de knie heeft bent u klaar om in de buggy te stappen en kan het echte kitebuggyen beginnen. ',
        'Zandvoort', '09:00:00', '12:00:00', 12, 0, '01-06-19', '/media/activities/004-kite-bugying.jpg');

INSERT INTO `activities` (`a_name`, `a_desc`, `a_location`, `a_start_time`, `a_end_time`, `a_max`, `a_used`, `a_deadline`, `a_image`)
VALUES ('Kitebuggyen', 'Met grote snelheid over het strand racen, voortgetrokken door speciale kitebuggyvliegers die het voor iedereen mogelijk maken om te kitebuggyen. De activiteit begint bij ons altijd met een kite workshop waarin u de kite leert besturen, leert stoppen en de juiste krachten leert krijgen. Als u de kite onder de knie heeft bent u klaar om in de buggy te stappen en kan het echte kitebuggyen beginnen. ',
        'Zandvoort', '13:00:00', '16:00:00', 12, 0, '01-06-19', '/media/activities/004-kite-bugying.jpg');

INSERT INTO `activities` (`a_name`, `a_desc`, `a_location`, `a_start_time`, `a_end_time`, `a_max`, `a_used`, `a_deadline`, `a_image`)
VALUES ('Zandsculpturen maken', 'Een Zandsculpturen workshop, je hebt het vast wel eens gezien, kunstwerken gemaakt in het zand waarvan je denkt, hoe doen ze dat?! Met deze workshop gaan jullie dat leren, echt waar. Onder leiding van onze docent maken jullie eerst een mal op een speciale manier. Hierna leer je hoe je sculpturen kunt maken met onze materialen. Als team samen te werk gaan aan één groot kunstwerk is echt een uitdaging.',
        'Zandvoort', '10:30:00', '12:30:00', 10, 0, '12-06-19', '/media/activities/005-sand-castle.jpg');

INSERT INTO `activities` (`a_name`, `a_desc`, `a_location`, `a_start_time`, `a_end_time`, `a_max`, `a_used`, `a_deadline`, `a_image`)
VALUES ('Zandsculpturen maken', 'Een Zandsculpturen workshop, je hebt het vast wel eens gezien, kunstwerken gemaakt in het zand waarvan je denkt, hoe doen ze dat?! Met deze workshop gaan jullie dat leren, echt waar. Onder leiding van onze docent maken jullie eerst een mal op een speciale manier. Hierna leer je hoe je sculpturen kunt maken met onze materialen. Als team samen te werk gaan aan één groot kunstwerk is echt een uitdaging.',
        'Zandvoort', '13:40:00', '15:40:00', 10, 0, '12-06-19', '/media/activities/005-sand-castle.jpg');

INSERT INTO `activities` (`a_name`, `a_desc`, `a_location`, `a_start_time`, `a_end_time`, `a_max`, `a_used`, `a_deadline`, `a_image`)
VALUES ('Cityhunt', 'Met deze spannende interactieve City Hunt nemen jullie het in teams tegen elkaar op. Ieder team heeft een smartphone of tablet waarmee het spel wordt gespeeld in het stadscentrum. Op de smartphone of tablet staan punten aangegeven en bij deze punten zie je hoeveel punten je kan verdienen met die opdracht. Elk team plant zijn eigen route door het centrum en kan punten verdienen door het oplossen van raadsels en puzzels en door middel van het maken van ludieke foto’s (afhankelijk van de opdracht). Het team dat de meeste punten weet te verzamelen en de snelste tijd neer zet zal dit spannende uitje winnen.',
        'Utrecht', '09:00:00', '14:00:00', 19, 0, '05-06-19', '/media/activities/001-city-hunt.jpg');