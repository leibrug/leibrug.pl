<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<article class="page type-page hentry page-cv" id="cv"></article>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

	<script id="cv-template" type="x-tmpl-mustache">
		<div class="cv-contact">
			<strong>{{basics.name}}</strong><br>
			<a href="mailto:{{basics.email}}">{{basics.email}}</a><br>
			<a href="tel:{{basics.phone}}">{{basics.phone}}</a>
		</div>
		<div class="cv-summary">
			{{basics.summary}}
		</div>
		<div></div>
		<div class="cv-skills">
			<h2>Skills</h2>
			<ul>
				{{#skills}}
				<li>{{name}} {{skillStars}}<br>{{{skillSet}}}
				{{/skills}}
			</ul>
		</div>
		<div class="cv-experience">
			<h2>Working experience</h2>
			{{#work}}
				<h3>{{startYear}} - {{endYear}}: <em>{{position}},</em> {{company}}</h3>
				{{#summary}}
				<p>{{summary}}</p>
				{{/summary}}
				<ul>
					{{#highlights}}
					<li>{{.}}
					{{/highlights}}
				</ul>		
			{{/work}}
		</div>
		<div class="cv-experience">
			<h2>Volunteer</h2>
			{{#volunteer}}
				<h3>{{startYear}} - {{endYear}}: <em>{{position}},</em> {{organization}}</h3>
				<p>{{summary}}</p>
			{{/volunteer}}
		</div>
		<div class="cv-personal">
			<h2>Characteristics</h2>
			<ul>
				<li>Independent
				<li>Creative
				<li>Quick learner
			</ul>
			<h2>Interests</h2>
			<ul>
				{{#interests}}
				<li>{{name}}
				{{/interests}}
			</ul>
		</div>	
		<div class="cv-links">
			<h2>Links</h2>
			<ul>
				<li><a href="http://leibrug.pl" target="_blank">http://leibrug.pl</a><br>
				<span>My homepage including selected work, blog and full CV</span>
				<li><a href="http://cctzn.leibrug.pl" target="_blank">http://cctzn.leibrug.pl</a><br>
				<span>Movie marathon planning app written in JS</span>
				<li><a href="http://youtu.be/MyB521kWOe4" target="_blank">http://youtu.be/MyB521kWOe4</a><br>
				<span>Showreel of my video pieces from 2007-2010</span>
			</ul>
		</div>
		<div></div>
	</script>

	<script>
		(function() {
			
			function extend(view) {

				function yearOnly(date) {
					return date.substr(0, 4);
				}
				
				view.startYear = function() {
					return yearOnly(this.startDate);
				};
				view.endYear = function() {
					if (!this.endDate) {
						return 'present';
					}
					return yearOnly(this.endDate);
				};
				view.skillStars = function() {
					var	stars = parseInt(this.level),
						output = '';
					while (stars) {
						output += '*';
						stars--;
					}
					return output;
				};
				view.skillSet = function() {
					if (this.keywords.length) {
						return '<span>' + this.keywords.join(', ') + '</span>';
					}
				};
				
				return view;
			}
			
			var	cvRequest = new XMLHttpRequest(),
				template = document.getElementById('cv-template').innerHTML;
			
			Mustache.parse(template);
			cvRequest.open('GET', 'http://leibrug.pl/wordpress/wp-content/themes/leibrug/resume.json', true);
			cvRequest.onreadystatechange = function() {
				if (cvRequest.readyState == 4 && cvRequest.status == 200) {
					var	view = extend(JSON.parse(cvRequest.responseText));					
					document.getElementById('cv').innerHTML = Mustache.render(template, view);
				}
			}
			cvRequest.send(null);

		}());
	</script>

<?php get_footer(); ?>
