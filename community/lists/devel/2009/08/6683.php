<?
$subject_val = "Re: [OMPI devel] XML request";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Aug 20 13:53:07 2009" -->
<!-- isoreceived="20090820175307" -->
<!-- sent="Thu, 20 Aug 2009 11:52:51 -0600" -->
<!-- isosent="20090820175251" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] XML request" -->
<!-- id="D5997B7A-1DB0-42F0-8EA6-38A2DEE354E2_at_open-mpi.org" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="45AD1E0B-9D8D-4F42-880D-8BB10193962D_at_computer.org" -->
<!-- expires="-1" -->
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<p class="headers">
<strong>Subject:</strong> Re: [OMPI devel] XML request<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2009-08-20 13:52:51
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="6684.php">Greg Watson: "Re: [OMPI devel] XML request"</a>
<li><strong>Previous message:</strong> <a href="6682.php">Greg Watson: "Re: [OMPI devel] XML request"</a>
<li><strong>In reply to:</strong> <a href="6682.php">Greg Watson: "Re: [OMPI devel] XML request"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="6684.php">Greg Watson: "Re: [OMPI devel] XML request"</a>
<li><strong>Reply:</strong> <a href="6684.php">Greg Watson: "Re: [OMPI devel] XML request"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Hi Greg
<br>
<p>I can catch most of these and will do so as they flow through a single  
<br>
code path. However, there are places sprinkled throughout the code  
<br>
where people directly output warning and error info - these will be  
<br>
more problematic and represent a degree of change that is probably  
<br>
outside the comfort zone for the 1.3 series.
<br>
<p>After talking with Jeff about it, we propose that I make the simple  
<br>
change that will  catch messages like those below. For the broader  
<br>
problem, we believe that some discussion with you about the degree of  
<br>
granularity exposed through the xml output might help define the  
<br>
overall solution. For example, can we just label all stderr messages  
<br>
with &lt;stderr&gt;&lt;/stderr&gt; tags, or do you need more detailed tagging  
<br>
(e.g., rank, file, line, etc.)?
<br>
<p>That discussion can occur later - for now, I'll catch these. Will let  
<br>
you know when it is ready to test!
<br>
<p>Ralph
<br>
<p>On Aug 20, 2009, at 11:16 AM, Greg Watson wrote:
<br>
<p><span class="quotelev1">&gt; Ralph,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; One more thing. Even with XML enabled, I notice that some error  
</span><br>
<span class="quotelev1">&gt; messages are still sent to stderr without XML tags (see below.) Any  
</span><br>
<span class="quotelev1">&gt; chance these could be sent to stdout wrapped in &lt;stderr&gt;&lt;/stderr&gt;  
</span><br>
<span class="quotelev1">&gt; tags?
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Thanks,
</span><br>
<span class="quotelev1">&gt; Greg
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; $ mpirun -mca orte_show_resolved_nodenames 1 -xml -display-map -np  
</span><br>
<span class="quotelev1">&gt; 1 ./pop pop_in
</span><br>
<span class="quotelev1">&gt; &lt;mpirun&gt;
</span><br>
<span class="quotelev1">&gt; &lt;map&gt;
</span><br>
<span class="quotelev1">&gt; 	&lt;host name=&quot;4pcnuggets&quot; slots=&quot;1&quot; max_slots=&quot;0&quot;&gt;
</span><br>
<span class="quotelev1">&gt; 		&lt;process rank=&quot;0&quot;/&gt;
</span><br>
<span class="quotelev1">&gt; 	&lt;/host&gt;
</span><br>
<span class="quotelev1">&gt; &lt;/map&gt;
</span><br>
<span class="quotelev1">&gt; --------------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt; MPI_ABORT was invoked on rank 0 in communicator MPI_COMM_WORLD
</span><br>
<span class="quotelev1">&gt; with errorcode 0.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; NOTE: invoking MPI_ABORT causes Open MPI to kill all MPI processes.
</span><br>
<span class="quotelev1">&gt; You may or may not see output from other processes, depending on
</span><br>
<span class="quotelev1">&gt; exactly when Open MPI kills them.
</span><br>
<span class="quotelev1">&gt; --------------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt; &lt;stdout  
</span><br>
<span class="quotelev1">&gt; rank 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; &quot;0 
</span><br>
<span class="quotelev1">&gt; &quot;&gt; 
</span><br>
<span class="quotelev1">&gt; ------------------------------------------------------------------------&amp;#010 
</span><br>
<span class="quotelev1">&gt; ;&lt;/stdout&gt;
</span><br>
<span class="quotelev1">&gt; &lt;stdout rank=&quot;0&quot;&gt; &amp;#010;&lt;/stdout&gt;
</span><br>
<span class="quotelev1">&gt; &lt;stdout rank=&quot;0&quot;&gt; Parallel Ocean Program (POP) &amp;#010;&lt;/stdout&gt;
</span><br>
<span class="quotelev1">&gt; &lt;stdout rank=&quot;0&quot;&gt;  Version 2.0.1 Released 21 Jan 2004&amp;#010;&lt;/stdout&gt;
</span><br>
<span class="quotelev1">&gt; &lt;stdout rank=&quot;0&quot;&gt; &amp;#010;&lt;/stdout&gt;
</span><br>
<span class="quotelev1">&gt; &lt;stdout  
</span><br>
<span class="quotelev1">&gt; rank 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; &quot;0 
</span><br>
<span class="quotelev1">&gt; &quot;&gt; 
</span><br>
<span class="quotelev1">&gt; ------------------------------------------------------------------------&amp;#010 
</span><br>
<span class="quotelev1">&gt; ;&lt;/stdout&gt;
</span><br>
<span class="quotelev1">&gt; &lt;stdout  
</span><br>
<span class="quotelev1">&gt; rank 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; &quot;0 
</span><br>
<span class="quotelev1">&gt; &quot;&gt; 
</span><br>
<span class="quotelev1">&gt; ------------------------------------------------------------------------&amp;#010 
</span><br>
<span class="quotelev1">&gt; ;&lt;/stdout&gt;
</span><br>
<span class="quotelev1">&gt; &lt;stdout rank=&quot;0&quot;&gt; &amp;#010;&lt;/stdout&gt;
</span><br>
<span class="quotelev1">&gt; &lt;stdout rank=&quot;0&quot;&gt;POP aborting...&amp;#010;&lt;/stdout&gt;
</span><br>
<span class="quotelev1">&gt; &lt;stdout rank=&quot;0&quot;&gt; Input nprocs not same as system request&amp;#010;&lt;/ 
</span><br>
<span class="quotelev1">&gt; stdout&gt;
</span><br>
<span class="quotelev1">&gt; &lt;stdout rank=&quot;0&quot;&gt; &amp;#010;&lt;/stdout&gt;
</span><br>
<span class="quotelev1">&gt; &lt;stdout  
</span><br>
<span class="quotelev1">&gt; rank 
</span><br>
<span class="quotelev1">&gt; = 
</span><br>
<span class="quotelev1">&gt; &quot;0 
</span><br>
<span class="quotelev1">&gt; &quot;&gt; 
</span><br>
<span class="quotelev1">&gt; ------------------------------------------------------------------------&amp;#010 
</span><br>
<span class="quotelev1">&gt; ;&lt;/stdout&gt;
</span><br>
<span class="quotelev1">&gt; --------------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt; mpirun has exited due to process rank 0 with PID 15201 on
</span><br>
<span class="quotelev1">&gt; node 4pcnuggets exiting without calling &quot;finalize&quot;. This may
</span><br>
<span class="quotelev1">&gt; have caused other processes in the application to be
</span><br>
<span class="quotelev1">&gt; terminated by signals sent by mpirun (as reported here).
</span><br>
<span class="quotelev1">&gt; --------------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Aug 19, 2009, at 10:48 AM, Greg Watson wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Ralph,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Looks like it's working now.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Thanks,
</span><br>
<span class="quotelev2">&gt;&gt; Greg
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Aug 18, 2009, at 5:21 PM, Ralph Castain wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Give r21836 a try and see if it still gets out of order.
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Ralph
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Aug 18, 2009, at 2:18 PM, Greg Watson wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Ralph,
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Not sure that's it because all XML output should be via stdout.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Greg
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; On Aug 18, 2009, at 3:53 PM, Ralph Castain wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Hmmm....let me try adding a fflush after the &lt;mpirun&gt; output to  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; force it out. Best guess is that you are seeing a little race  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; condition - the map output is coming over stderr, while the  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &lt;mpirun&gt; tag is coming over stdout.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; On Tue, Aug 18, 2009 at 12:53 PM, Greg Watson &lt;g.watson_at_[hidden] 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt; &gt; wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Hi Ralph,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; I'm seeing something strange. When I run &quot;mpirun -mca  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; orte_show_resolved_nodenames 1 -xml -display-map...&quot;, I see:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &lt;mpirun&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &lt;map&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;        &lt;host name=&quot;Jarrah.local&quot; slots=&quot;1&quot; max_slots=&quot;0&quot;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;                &lt;process rank=&quot;0&quot;/&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;                &lt;process rank=&quot;1&quot;/&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;                &lt;process rank=&quot;2&quot;/&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;                &lt;process rank=&quot;3&quot;/&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;        &lt;/host&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &lt;/map&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ...
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &lt;/mpirun&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; but when I run &quot; ssh localhost mpirun -mca  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; orte_show_resolved_nodenames 1 -xml -display-map...&quot;, I see:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &lt;map&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;        &lt;host name=&quot;Jarrah.local&quot; slots=&quot;1&quot; max_slots=&quot;0&quot;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;                &lt;process rank=&quot;0&quot;/&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;                &lt;process rank=&quot;1&quot;/&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;                &lt;process rank=&quot;2&quot;/&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;                &lt;process rank=&quot;3&quot;/&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;        &lt;/host&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &lt;/map&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &lt;mpirun&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ...
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &lt;/mpirun&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Any ideas?
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Thanks,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Greg
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; On Aug 17, 2009, at 11:16 PM, Ralph Castain wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Should be done on trunk with r21826 - would you please give it a  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; try and let me know if that meets requirements? If so, I'll move  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; it to 1.3.4.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Thanks
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Ralph
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; On Aug 17, 2009, at 6:42 AM, Greg Watson wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Hi Ralph,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Yes, you'd just need issue the start tag prior to any other XML  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; output, then the end tag when it's guaranteed all XML other  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; output has been sent.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Greg
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; On Aug 17, 2009, at 7:44 AM, Ralph Castain wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; All things are possible - some just a tad more painful than  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; others.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; It looks like you want the mpirun tags to flow around all output  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; during the run - i.e., there is only one pair of mpirun tags  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; that surround anything that might come out of the job. True?
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; If so, that would be trivial.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; On Aug 14, 2009, at 9:25 AM, Greg Watson wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Ralph,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Would it be possible to get mpirun to issue start and end tags  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; if the -xml option is used? Currently there is no way to  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; determine when the output starts and finishes, which makes  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; parsing the XML tricky, particularly if something else generates  
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; output (e.g. the shell). Something like this would be ideal:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &lt;mpirun&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &lt;map&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ...
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &lt;/map&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &lt;stdout&gt;...&lt;/stdout&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &lt;stderr&gt;...&lt;/stderr&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; &lt;/mpirun&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; If we could get it in 1.3.4 even better. :-)
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Thanks,
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Greg
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<p><p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-6683/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="6684.php">Greg Watson: "Re: [OMPI devel] XML request"</a>
<li><strong>Previous message:</strong> <a href="6682.php">Greg Watson: "Re: [OMPI devel] XML request"</a>
<li><strong>In reply to:</strong> <a href="6682.php">Greg Watson: "Re: [OMPI devel] XML request"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="6684.php">Greg Watson: "Re: [OMPI devel] XML request"</a>
<li><strong>Reply:</strong> <a href="6684.php">Greg Watson: "Re: [OMPI devel] XML request"</a>
<!-- reply="end" -->
</ul>
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<!-- trailer="footer" -->
<? include("../../include/msg-footer.inc") ?>
