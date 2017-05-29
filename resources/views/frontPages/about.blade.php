@extends('layouts.frontend')
    @section('content')
        @include('includes.alert')
        
		<div class="container">
		 <br><br>
		 <h1 style="color: #505050; border-left: 6px solid #a63a3a; padding-left: 8px;">About</h1>
<!--
		 <h2 style="text-align: left; color: #804040; font-size: 16px; ">Project Manager</h2>
		 	<p>
		 		Md. Saiful Saif
		 		<br>
		 		Assistant professor
		 		<br>
		 		Department of CSE, SUST.
		 	</p>

		 <h2 style="text-align: left; color: #804040; font-size: 16px;">Developers</h2>
		 	<p>
		 		Masiur Rahman Siddiki
		 		<br>
		 		Department of CSE, SUST.
		 	</p>
		 	<br>
		 	<p>
		 		Md. Abdullah Al Awal
		 		<br>
		 		Department of CSE, SUST.
		 	</p>
-->
			<p>
				The Open Bangla Corpus (OBC) project is fostering the development of a corpus comparable to the Open Source Bengali Corpus (OSBC), covering Bangla language. Corpus-analytic work has demonstrated that the OBC is inappropriate for the study of Bangla language, due to the numerous differences in use of the language.

				Previous work on bangla Coupus are done by department contains twelve categories. Its contains filtered data. It is located at <a style="color: red;" href="http://scdnlab.com/corpus/">scdnlab.com/corpus</a>
				<br>
				Our OBC contains approximately 90,000 unique words. OBC contains categories like education, science-tech, art, crime, entertainment, environment, international, sports & politics. 
				<br>
				OBC also contains 20,000 text with 9 categories and 10,000 of unique words. We collected data from social sites. As OBC is open source corpus generic users also contribute here.
				<br>
				Anyone can contribute in our OBC. It also filter data in an efficient manner. We hope the OBC will contribute a lot in Bangla linguistic arena.
<!--
Since the OBC Second Release of 22 million words of data through the Linguistic Data Consortium (LDC) in 2005, the OBC project has committed to including only fully open data in the corpus and distributing all data and annotations freely from our website.  TheOBC project currently holds about 40 million additional words of open data, which will be processed for inclusion in the OBC when funding for its production becomes available.

The OBC is a collaborative development project that relies on contributions of data and annotations from the linguistics and natural language processing communities as well as the public at large.

The goal for the OBC is to contain a core corpus of at least 100 million words, including both written and spoken (transcripts) data comparable across genres to the OBC. The genres in the OBC also include “new” types of language data that has become available in recent years, such as web blogs and web pages, tweets, chats, email, and rap music lyrics. In addition to the core 100 million words, the OBC will include an additional component of potentially several hundreds of millions of words, chosen to provide both the broadest and largest selection of data possible.

Unlike the OBC, the OBC is annotated for multiple linguistic phenomena, including logical structure, word and sentence boundary, lemma and part-of-speech (for several different tag sets), shallow parse (noun and verb chunks), and named entities (person, organization, location, date). All annotations are automatically produced and unvalidated. A 500,000 word subset of the OBC, the Manually Annotated Sub-Corpus (MASC), includes these and other annotations for a wide range of linguistic phenomena that have been either manually produced or hand validated.

A consortium of publishers of American English dictionaries and companies with interests in language processing provided a set of materials for inclusion in theOBC First and Second Releases and provided initial fiOBCial support for the project. The ANC Project has also received support from the National Science Foundation, the TalkBank Project, and the Department of Chinese, Translation, and Linguistics at the City University of Hong Kong. The project has also received technical support from the developers of the General Architecture for Text Engineering (GATE).
-->
			</p>
		</div>

@stop