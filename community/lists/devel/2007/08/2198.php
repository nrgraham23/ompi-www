<? include("../../include/msg-header.inc"); ?>
<!-- received="Mon Aug 20 07:11:41 2007" -->
<!-- isoreceived="20070820111141" -->
<!-- sent="Mon, 20 Aug 2007 07:12:44 -0400" -->
<!-- isosent="20070820111244" -->
<!-- name="Terry D. Dontje" -->
<!-- email="Terry.Dontje_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] [RFC] Runtime Services Layer" -->
<!-- id="46C9772C.2050705_at_sun.com" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="200708162147.10145.tprins_at_cs.indiana.edu" -->
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
<strong>From:</strong> Terry D. Dontje (<em>Terry.Dontje_at_[hidden]</em>)<br>
<strong>Date:</strong> 2007-08-20 07:12:44
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="2199.php">Tim Prins: "Re: [OMPI devel] [RFC] Runtime Services Layer"</a>
<li><strong>Previous message:</strong> <a href="2197.php">Tim Prins: "Re: [OMPI devel] [devel-core] [RFC] Runtime Services Layer"</a>
<li><strong>In reply to:</strong> <a href="2170.php">Tim Prins: "[OMPI devel] [RFC] Runtime Services Layer"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="2199.php">Tim Prins: "Re: [OMPI devel] [RFC] Runtime Services Layer"</a>
<li><strong>Reply:</strong> <a href="2199.php">Tim Prins: "Re: [OMPI devel] [RFC] Runtime Services Layer"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I think the concept is a good idea.  A few questions that come to mind:
<br>
<p>1.  Do you have a set of APIs you plan on supporting? 
<br>
2.  Are you planning on adding new APIs (not currently supported by ORTE)?
<br>
3.  Do any of the ORTE replacement APIs differ in how they work?
<br>
4.  Will RSL change in how we access information from the GPR?  If not
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;how does this layer really separate us from ORTE?
<br>
5.  How will RSL handle OOB functionality (routing of messages)?
<br>
6.  How does making the process names opaque differ from how ORTE
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;names processes?  Do you still need a global namespace for a 
<br>
&quot;universe&quot;?
<br>
<p>I like the idea but I really wonder if this will even be half-baked in 
<br>
time for
<br>
1.3  (same concern as Jeff's).
<br>
<p>--td
<br>
<p>Tim Prins wrote:
<br>
<p><span class="quotelev1">&gt;WHAT: Solicitation of feedback on the possibility of adding a runtime 
</span><br>
<span class="quotelev1">&gt;services layer to Open MPI to abstract out the runtime.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;WHY: To solidify the interface between OMPI and the runtime environment, 
</span><br>
<span class="quotelev1">&gt;and to allow the use of different runtime systems, including different 
</span><br>
<span class="quotelev1">&gt;versions of ORTE.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;WHERE: Addition of a new framework to OMPI, and changes to many of the 
</span><br>
<span class="quotelev1">&gt;files in OMPI to funnel all runtime request through this framework. Few 
</span><br>
<span class="quotelev1">&gt;changes should be required in OPAL and ORTE.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;WHEN: Development has started in tmp/rsl, but is still in its infancy. We hope 
</span><br>
<span class="quotelev1">&gt;to have a working system in the next month.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;TIMEOUT: 8/29/07
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;------
</span><br>
<span class="quotelev1">&gt;Short version:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;I am working on creating an interface between OMPI and the runtime system. 
</span><br>
<span class="quotelev1">&gt;This would make a RSL framework in OMPI which all runtime services would be 
</span><br>
<span class="quotelev1">&gt;accessed from. Attached is a graphic depicting this.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;This change would be invasive to the OMPI layer. Few (if any) changes 
</span><br>
<span class="quotelev1">&gt;will be required of the ORTE and OPAL layers.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;At this point I am soliciting feedback as to whether people are 
</span><br>
<span class="quotelev1">&gt;supportive or not of this change both in general and for v1.3.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;Long version:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;The current model used in Open MPI assumes that one runtime system is 
</span><br>
<span class="quotelev1">&gt;the best for all environments. However, in many environments it may be 
</span><br>
<span class="quotelev1">&gt;beneficial to have specialized runtime systems. With our current system this 
</span><br>
<span class="quotelev1">&gt;is not easy to do.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;With this in mind, the idea of creating a 'runtime services layer' was 
</span><br>
<span class="quotelev1">&gt;hatched. This would take the form of a framework within OMPI, through which 
</span><br>
<span class="quotelev1">&gt;all runtime functionality would be accessed. This would allow new or 
</span><br>
<span class="quotelev1">&gt;different runtime systems to be used with Open MPI. Additionally, with such a
</span><br>
<span class="quotelev1">&gt;system it would be possible to have multiple versions of open rte coexisting,
</span><br>
<span class="quotelev1">&gt;which may facilitate development and testing. Finally, this would solidify the 
</span><br>
<span class="quotelev1">&gt;interface between OMPI and the runtime system, as well as provide 
</span><br>
<span class="quotelev1">&gt;documentation and side effects of each interface function.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;However, such a change would be fairly invasive to the OMPI layer, and 
</span><br>
<span class="quotelev1">&gt;needs a buy-in from everyone for it to be possible.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;Here is a summary of the changes required for the RSL (at least how it is 
</span><br>
<span class="quotelev1">&gt;currently envisioned):
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;1. Add a framework to ompi for the rsl, and a component to support orte.
</span><br>
<span class="quotelev1">&gt;2. Change ompi so that it uses the new interface. This involves:
</span><br>
<span class="quotelev1">&gt;         a. Moving runtime specific code into the orte rsl component.
</span><br>
<span class="quotelev1">&gt;         b. Changing the process names in ompi to an opaque object.
</span><br>
<span class="quotelev1">&gt;         c. change all references to orte in ompi to be to the rsl.
</span><br>
<span class="quotelev1">&gt;3. Change the configuration code so that open-rte is only linked where needed.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;Of course, all this would happen on a tmp branch.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;The design of the rsl is not solidified. I have been playing in a tmp branch 
</span><br>
<span class="quotelev1">&gt;(located at <a href="https://svn.open-mpi.org/svn/ompi/tmp/rsl">https://svn.open-mpi.org/svn/ompi/tmp/rsl</a>) which everyone is 
</span><br>
<span class="quotelev1">&gt;welcome to look at and comment on, but be advised that things here are 
</span><br>
<span class="quotelev1">&gt;subject to change (I don't think it even compiles right now). There are 
</span><br>
<span class="quotelev1">&gt;some fairly large open questions on this, including:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;1. How to handle mpirun (that is, when a user types 'mpirun', do they 
</span><br>
<span class="quotelev1">&gt;always get ORTE, or do they sometimes get a system specific runtime). Most 
</span><br>
<span class="quotelev1">&gt;likely mpirun will always use ORTE, and alternative launching programs would 
</span><br>
<span class="quotelev1">&gt;be used for other runtimes.
</span><br>
<span class="quotelev1">&gt;2. Whether there will be any performance implications. My guess is not, 
</span><br>
<span class="quotelev1">&gt;but am not quite sure of this yet.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;Again, I am interested in people's comments on whether they think adding 
</span><br>
<span class="quotelev1">&gt;such abstraction is good or not, and whether it is reasonable to do such a 
</span><br>
<span class="quotelev1">&gt;thing for v1.3.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;Thanks,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;Tim Prins
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;------------------------------------------------------------------------
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;_______________________________________________
</span><br>
<span class="quotelev1">&gt;devel mailing list
</span><br>
<span class="quotelev1">&gt;devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;<a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="2199.php">Tim Prins: "Re: [OMPI devel] [RFC] Runtime Services Layer"</a>
<li><strong>Previous message:</strong> <a href="2197.php">Tim Prins: "Re: [OMPI devel] [devel-core] [RFC] Runtime Services Layer"</a>
<li><strong>In reply to:</strong> <a href="2170.php">Tim Prins: "[OMPI devel] [RFC] Runtime Services Layer"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="2199.php">Tim Prins: "Re: [OMPI devel] [RFC] Runtime Services Layer"</a>
<li><strong>Reply:</strong> <a href="2199.php">Tim Prins: "Re: [OMPI devel] [RFC] Runtime Services Layer"</a>
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
