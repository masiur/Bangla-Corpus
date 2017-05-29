@extends('layouts.frontend')
    @section('content')
        @include('includes.alert')

      	<div class="container">

        	<br><br>
        	<h1 style="color: #505050; border-left: 6px solid #a63a3a; padding-left: 8px;">The Open Bangla Corpus</h1>
        	<br>
        	<p>
        		The Open Bangla Corpus (OBC) is a massive electronic collection of Bangla, including texts of all genres and transcripts of spoken data produced from 2008 onward. All data and annotations are fully open and unrestricted for any use.
        	</p>
        	<!-- <h2 style="text-align: left; color: #804040; font-size: 16px; ">Available Data and Annotations</h2>
        	<p>
        		<strong style="color: #a63a3a;">OBC</strong> : Approximately 15 million words of contemporary Bangla with automatically-produced annotations for a variety of linguistic phenomena.
        	</p>
        	<p>
        		<strong style="color: #a63a3a;">MABC</strong> : Approximately 5,00,000 words of OBC data equally distributed over Bangla, with manully produced or validated annotations for linguistic phenomena.
        	</p>
        	<h4 style="color: #404040; font-size: 13px;">
        		<a href="">
        			<font style="color: maroon;">
        				>> BROWSE OBC CONTENTS
        			</font>
        		</a>
        	</h4>
        	<h4 style="color: #404040; font-size: 13px;">
        		<a href="">
        			<font style="color: maroon;">
        				>> BROWSE MABC CONTENTS
        			</font>
        		</a>
        	</h4> -->
        	<h2 style="text-align: left; color: #804040; font-size: 16px; ">Contribute Text, Annotations, and Derived Data</h2>
        	<h4 style="color: #404040; font-size: 13px;">
        		<a href="">
        			<font style="color: maroon;">
        				>> <a href="{{ route('contribute.index') }}">Contribute Section</a>
        			</font>
        		</a>
        	</h4>
        	<!-- <h4 style="color: #404040; font-size: 13px;">
        		<a href="">
        			<font style="color: maroon;">
        			>> CONTRIBUTE ANNOTATIONS AND DERIVED DATA
        			</font>
        		</a>
        	</h4> -->

        </div>

@stop