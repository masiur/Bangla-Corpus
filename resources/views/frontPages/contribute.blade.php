@extends('layouts.frontend')
    @section('content')
        @include('includes.alert')
        <div class="container">
        <br><br>
        
	        <div class="col-md-9 col-md-offset-1">
	        <h3>Contribute Texts</h3>
	        	<div class="row">
	        		<div class="col-md-4">
	        			<ul>
	        				<li><a data-toggle="tab" href="#contribute">Contribute Now</a></li>
	        				<li><a data-toggle="tab" href="#criteria">Criteria</a></li>
	        				<li><a data-toggle="tab" href="#copyright">Copyright Issues</a></li>
	        				<li><a data-toggle="tab" href="#format">Format</a></li>
	        				<li><a data-toggle="tab" href="#anonymcontributions">Anonymous Contributions</a></li>

	        			</ul>
	        		</div>
	        		<div class="col-md-8">
	        			<div class="tab-content">

	        				<div id="contribute" class="tab-pane fade in active">
		        				<h4>Contribute Text Now</h4>
		        				<p>The NLP Lab invites contributions of language data, including published and unpublished written and spoken (i.e., transcriptions) documents of all genres, including fiction, non-fiction, poetry, newspapers, magazines, journals, pamphlets, diaries etc., as well as web-based language data such as blogs, web pages, tweets, email, etc. and other less common genres such as rap lyrics.</p>
								<a class="btn btn-success" href="{{ route('contribute.text') }}">Proceed</a>	
							</div>

	        				<div id="criteria" class="tab-pane fade in">
		        				<h4>Criteria</h4>
								<p>The American National Corpus includes written and spoken (i.e., transcriptions) materials that fulfill the following requirements:</p>
								<ul>
								<li>The materials must have been originally produced in or after the year 1990.</li>
								<li>The author(s)/speaker(s) must be native speakers of American English (<a href="http://www.anc.org/contribute/texts/native-speaker/">Who qualifies as a native speaker of American English?</a>)</li>
								<li>The contributor(s) must own the copyright to the materials, or the materials must be in the public domain (see <a href="http://www.anc.org/contribute/texts/copyright-issues/">Copyright issues</a>).</li>
								<li>Individual documents should contain no fewer than 1000 words.</li>
								<li>Documents should consist primarily of language data&#8211;i.e., we do not want documents that contain mostly tables, formulas, images, etc.</li>
								</ul>
								<p>If you have any doubt or questions about the suitability of your contribution, please do not hesitate to <a href="mailto:anc@cs.vassar.edu">contact us</a> and we will get back to you right away.</p>
								<p>We may choose not to include a document in the corpus at all if there is some doubt that the author is a native speaker of American English, or if we are unable, for technical reasons, to extract meaningful information from the documents (see Format).</p>
							</div>

							<div id="copyright" class="tab-pane fade in">
		        				<h4>Copyright Issues</h4>
								<p>Copyright is the legal exclusive right of the author of a work to control the copying of that work. Most information on the web and elsewhere concerns whether or not your using something (especially, these days, material from the web) is a violation of the creator&#8217;s copyright. Here, we are concerned with ensuring we do not violate <em>your</em> copyright rights when you contribute data to the ANC.</p>
								<p>The reason for this is that in the USA, <strong>almost everything created privately and originally after April 1, 1989 is copyrighted to the creator and protected whether it has a copyright notice or not.</strong> Therefore, if you produce a document, web page, or any other work, you own the copyright unless you have either</p>
								<ul>
								<li>explicitly transferred ownership to another entity (e.g., a publisher) in a contract or other legal document, or</li>
								<li>explicitly put it in the public domain, using a notice such as &#8220;I grant this to the public domain.&#8221;</li>
								</ul>
								<p>Unless you have put your document in the public domain (in which case we can include it in the ANC with no problem), we therefore must have your permission to include it in the ANC and re-distribute it. By contributing a text through the ANC upload page, you agree to the <a href="http://www.anc.org/contribute/">license agreement</a> at the bottom of this page. <strong>Agreeing to this license does not transfer copyright to the ANC.</strong></p>
								<p>If you have any qualms, please consult the<a href="http://www.anc.org/contribute/texts/faq/"> Frequently Asked Questions</a> page to learn why granting us the right to include your document does not put you in danger of others reproducing or &#8220;stealing&#8221; your work. If you still have qualms. note that documents may be contributed in part, for example, by extracting non-contiguous segments, such as chapters 1,2,4,5,8,9 from a book. However, to be useful for linguistic analysis, we only include extracts that are relatively long and coherent in the ANC&#8211;that is, we cannot use &#8220;every other sentence&#8221; in a text, but &#8220;every other chapter&#8221; is fine.</p>
								<p>For more information about copyright, we refer you to Brad Templeton&#8217;s <a href="http://www.templetons.com/brad/copyright.html">A brief intro to copyright</a> and <a href="http://www.templetons.com/brad/copymyths.html">10 Big Myths about copyright explained</a>.</p>
							</div>

							<div id="format" class="tab-pane fade in">
		        				<h4>Format</h4>
							</div>

							<div id="anonymcontributions" class="tab-pane fade in">
		        				<h4>Anonymous Contributions</h4>
								By default, the author of a contributed document is identified in the ANC header associated with the text. If you wish to contribute a document anonymously, you can enter “anonymous” in the author field on the upload page.							</div>
	        			</div>
	        		</div>
	        	</div>
	        </div>
        </div>


@stop