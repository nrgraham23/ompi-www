<?
$subject_val = "Re: [OMPI devel] RFC: Pineapple Runtime Interposition Project";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Jun 26 09:41:38 2012" -->
<!-- isoreceived="20120626134138" -->
<!-- sent="Tue, 26 Jun 2012 15:41:29 +0200" -->
<!-- isosent="20120626134129" -->
<!-- name="George Bosilca" -->
<!-- email="bosilca_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] RFC: Pineapple Runtime Interposition Project" -->
<!-- id="04FEDB37-D2D5-4AB7-BC08-58FAA8CA554B_at_eecs.utk.edu" -->
<!-- charset="iso-8859-1" -->
<!-- inreplyto="CAANzjEn6SVLvJOVBJFX-06=JZ4kWiTJwZ5Xi31ghwa2o3TMneA_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] RFC: Pineapple Runtime Interposition Project<br>
<strong>From:</strong> George Bosilca (<em>bosilca_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-06-26 09:41:29
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11178.php">George Bosilca: "Re: [OMPI devel] Warnings"</a>
<li><strong>Previous message:</strong> <a href="11176.php">Ralph Castain: "[OMPI devel] Warnings"</a>
<li><strong>In reply to:</strong> <a href="11175.php">Josh Hursey: "Re: [OMPI devel] RFC: Pineapple Runtime Interposition Project"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11180.php">Jeff Squyres: "Re: [OMPI devel] RFC: Pineapple Runtime Interposition Project"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
ORTE -&gt; ORTI : Open Runtime Interface
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&gt; ORTA : Open Runtime API
<br>
<p>&nbsp;&nbsp;george.
<br>
<p><p>On Jun 26, 2012, at 15:28 , Josh Hursey wrote:
<br>
<p><span class="quotelev1">&gt; The final thing to do for the Pineapple project is to give it a real
</span><br>
<span class="quotelev1">&gt; name. This is an easy sed script to patch the project, but finding a
</span><br>
<span class="quotelev1">&gt; name is somewhat challenging.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; The base parameters for the name are:
</span><br>
<span class="quotelev1">&gt; - it has to start with an 'O' word
</span><br>
<span class="quotelev1">&gt; - acronym must be 4 letters (O???)
</span><br>
<span class="quotelev1">&gt; - acronym must be pronounceable
</span><br>
<span class="quotelev1">&gt; - acronym must be G rated
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; A few suggestions:
</span><br>
<span class="quotelev1">&gt; - ORCA: Open Runtime Collaborative Abstraction
</span><br>
<span class="quotelev1">&gt; - OCRA: Open Collaborative Runtime Abstraction
</span><br>
<span class="quotelev1">&gt; - OREI: Open Runtime Environment Interface
</span><br>
<span class="quotelev1">&gt; - ORSL: Open Runtime Services Layer
</span><br>
<span class="quotelev1">&gt; - ORRA: Open Runtime Resource Abstraction
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; We need to decide this on the call today, so have fun thinking of suggestions.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -- Josh
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Mon, Jun 25, 2012 at 8:49 AM, Josh Hursey &lt;jjhursey_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt; Just a reminder that this change is headed for the trunk tomorrow
</span><br>
<span class="quotelev2">&gt;&gt; afternoon/evening. We will discuss it on the teleconf, but if you have
</span><br>
<span class="quotelev2">&gt;&gt; cycles to test please do so.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Thanks,
</span><br>
<span class="quotelev2">&gt;&gt; Josh
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On Fri, Jun 22, 2012 at 1:45 PM, Josh Hursey &lt;jjhursey_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; In response to some early feedback, I fixed the following in the
</span><br>
<span class="quotelev3">&gt;&gt;&gt; branch and updated the wiki:
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  * Fixed 'make distcheck' (missing a file)
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  * Cleanup some warnings from autogen and configure for -no-orte builds
</span><br>
<span class="quotelev3">&gt;&gt;&gt;  * Added an ./autogen.pl -no-pineapple option (give you just the
</span><br>
<span class="quotelev3">&gt;&gt;&gt; ORTE/OPAl stack) - see wiki
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Thanks for the feedback and keep it coming.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Also - The name will be changed before the commit to the trunk, I'm
</span><br>
<span class="quotelev3">&gt;&gt;&gt; working on some suggestions, but if you have any that you want to
</span><br>
<span class="quotelev3">&gt;&gt;&gt; lobby for let me know.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Thanks,
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Josh
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Fri, Jun 22, 2012 at 8:41 AM, Josh Hursey &lt;jjhursey_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; The pineapple branch is ready for testing. It was last sync'ed to the
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; trunk at r26620. I'll try to update that later today, and keep current
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; with the trunk moving forward.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; I created a wiki page to discuss some of the build options, for those
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; interested. At the bottom of the page are some remaining todo items
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; that I will probably need some help resolving.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;  <a href="https://svn.open-mpi.org/trac/ompi/wiki/Runtime_Interposition">https://svn.open-mpi.org/trac/ompi/wiki/Runtime_Interposition</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; The branch is at:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt;  <a href="https://bitbucket.org/jjhursey/ompi-pineapple">https://bitbucket.org/jjhursey/ompi-pineapple</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; I would like to bring this into the trunk the evening after the
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; teleconf on Tuesday, June 26, 2012. So if you have cycles to test this
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; branch I would appreciate it.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Thanks,
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Josh
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; On Fri, Jun 15, 2012 at 2:55 PM, Josh Hursey &lt;jjhursey_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; What: A Runtime Interposition Project - Codename Pineapple
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Why: Define clear API and semantics for runtime requirements of the OMPI layer.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; When:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  - F June 22, 2012 - Work completed
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  - T June 26, 2012 - Discuss on teleconf
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  - R June 28, 2012 - Commit to trunk
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Where: Trunk (development BitBucket branch below)
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  <a href="https://bitbucket.org/jjhursey/ompi-pineapple">https://bitbucket.org/jjhursey/ompi-pineapple</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Attached:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt;  PDF of slides presented on the June 12, 2012 teleconf. Note that the
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; timeline was slightly adjusted above (work completed date moved
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ealier).
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Description: Short Version
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --------------------------
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Define, in an 'rte.h', the interfaces and semantics that the OMPI
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; layer requires of a runtime environment. Currently this interface
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; matches the subset of ORTE functionality that is used by the OMPI
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; layer. Runtime symbols (e.g., orte_ess.proc_get_locality) are isolated
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; to a framework inside this project to provide linker-level protection
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; against accidental breakage of the pineapple interposition layer.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; The interposition project provides researchers working on side
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; projects above and below the 'rte.h' interface a single location in
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; the code base to watch for interface and semantic changes that they
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; need to be concerned about. Researchers working above the pineapple
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; layer might explore something other than (or in addition to) OMPI
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; (e.g., Extended OMPI, UPC+OMPI). Researchers working below the
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; pineapple layer might explore something other than (or in addition to)
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ORTE under OMPI (e.g., specialized runtimes for specific
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; environments).
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Description: Other notes
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ------------------------
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; The pineapple interface provides OMPI developers with a runtime API to
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; program against without requiring detailed knowledge of the layout of
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ORTE and its frameworks. In some places in OMPI a single source file
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; needs to include &gt;5 (up to 12 in one place) different header files to
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; get all of the necessary symbols. Developers must not only know where
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; these headers are, but must also understand the differences between
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; the various frameworks in ORTE to use ORTE. The developer must also be
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; aware that there are certain APIs and data structure fields that are
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; not available to the MPI process, so should not be used. The pineapple
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; project provides an API representing the small subset of ORTE that is
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; used by OMPI. With this API a developer only needs to look at a single
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; location in the code base to understand what is provided by the
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; runtime for use in the OMPI layer.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; A similar statement could be made for runtime developers trying to
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; figure out what the OMPI layer requires from the a runtime
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; environment. Currently they need a deep understanding of the behavior
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; of ORTE to understand the semantics of various calls to ORTE from the
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; OMPI layer. Then they must develop a custom patch for the OMPI layer
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; that extracts the ORTE symbols, and replaces them with their own
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; symbols. This process is messy, error prone, and tedious to say the
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; least. Having a single set of interfaces and semantics will allow such
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; developers to focus their efforts on supporting the Open MPI community
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; defined API, and not necessarily the evolution of the ORTE or OMPI
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; project internals. This is advantageous when porting Open MPI to an
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; environment with a full featured runtime already running on the
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; machine, and for researchers exploring radical runtime designs for
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; future systems. The pineapple API allows such projects to develop
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; beside the mainline Open MPI trunk a little more easily than without
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; the pineapple API.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; FAQ:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ----
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; (1) Why is this a separate project and not a framework of OMPI? or a
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; framework of ORTE?
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; After much deliberation between the developers, from a software
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; engineering perspective, making the pineapple rte.h interface a
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; separate project was the most flexible solution. So neither the OMPI
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; layer nor the ORTE layer 'own' the interface, but it is 'owned' by the
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Open MPI project primarily to support the interaction between these
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; two layers.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Consider that if we decided to place the interface in the OMPI layer
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; as a framework then we would be able to place something other than (or
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; in addition to) ORTE underneath OMPI, but we would be limited in our
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ability to place something other than (or in addition to) OMPI over
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ORTE. Alternatively, if we decided to place the rte.h interface in the
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; ORTE layer then we would be able to place something other than (or in
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; addition to) OMPI over ORTE, but we would be limited in our ability to
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; place something other than (or in addition to) ORTE under OMPI.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Defining the interposition layer as a separate project between these
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; two layers allows maximal flexibility for the project and researchers
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; working on side branches.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; (2) What if another project outside of Open MPI needs interface
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; changes to the pineapple 'rte.h'?
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; The rule of thumb is that 'The OMPI/ORTE/OPAL stack is king!'. This
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; means that the pineapple project should always err on the side of
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; supporting the OMPI/ORTE/OPAL stack, as that is the flagship product
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; of the Open MPI project. Interface suggestions are always welcome and
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; the rte.h may be extended/modified in the future as a result of those
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; suggestions. However, if a suggested change negatively impacts the
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; OMPI/ORTE/OPAL stack then it is unlikely to be accepted upstream by
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; the Open MPI community.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Joshua Hursey
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Postdoctoral Research Associate
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Oak Ridge National Laboratory
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; <a href="http://users.nccs.gov/~jjhursey">http://users.nccs.gov/~jjhursey</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; --
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Joshua Hursey
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Postdoctoral Research Associate
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Oak Ridge National Laboratory
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; <a href="http://users.nccs.gov/~jjhursey">http://users.nccs.gov/~jjhursey</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; --
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Joshua Hursey
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Postdoctoral Research Associate
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Oak Ridge National Laboratory
</span><br>
<span class="quotelev3">&gt;&gt;&gt; <a href="http://users.nccs.gov/~jjhursey">http://users.nccs.gov/~jjhursey</a>
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; --
</span><br>
<span class="quotelev2">&gt;&gt; Joshua Hursey
</span><br>
<span class="quotelev2">&gt;&gt; Postdoctoral Research Associate
</span><br>
<span class="quotelev2">&gt;&gt; Oak Ridge National Laboratory
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://users.nccs.gov/~jjhursey">http://users.nccs.gov/~jjhursey</a>
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -- 
</span><br>
<span class="quotelev1">&gt; Joshua Hursey
</span><br>
<span class="quotelev1">&gt; Postdoctoral Research Associate
</span><br>
<span class="quotelev1">&gt; Oak Ridge National Laboratory
</span><br>
<span class="quotelev1">&gt; <a href="http://users.nccs.gov/~jjhursey">http://users.nccs.gov/~jjhursey</a>
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
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11178.php">George Bosilca: "Re: [OMPI devel] Warnings"</a>
<li><strong>Previous message:</strong> <a href="11176.php">Ralph Castain: "[OMPI devel] Warnings"</a>
<li><strong>In reply to:</strong> <a href="11175.php">Josh Hursey: "Re: [OMPI devel] RFC: Pineapple Runtime Interposition Project"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11180.php">Jeff Squyres: "Re: [OMPI devel] RFC: Pineapple Runtime Interposition Project"</a>
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
