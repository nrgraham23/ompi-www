<?
$subject_val = "Re: [OMPI devel] RFC: Fix missing code in MPI_Abort functionality";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Jun  9 20:08:11 2011" -->
<!-- isoreceived="20110610000811" -->
<!-- sent="Thu, 9 Jun 2011 20:08:05 -0400" -->
<!-- isosent="20110610000805" -->
<!-- name="Joshua Hursey" -->
<!-- email="jjhursey_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] RFC: Fix missing code in MPI_Abort functionality" -->
<!-- id="8BD3ADB9-661A-4DB6-80E0-29D0A43B57D2_at_open-mpi.org" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="F3E744B3-BA4B-4FD5-80E9-3B6C2A457052_at_eecs.utk.edu" -->
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
<strong>Subject:</strong> Re: [OMPI devel] RFC: Fix missing code in MPI_Abort functionality<br>
<strong>From:</strong> Joshua Hursey (<em>jjhursey_at_[hidden]</em>)<br>
<strong>Date:</strong> 2011-06-09 20:08:05
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="9341.php">Joshua Hursey: "Re: [OMPI devel] RFC: Resilient ORTE"</a>
<li><strong>Previous message:</strong> <a href="9339.php">George Bosilca: "Re: [OMPI devel] RFC: Resilient ORTE"</a>
<li><strong>In reply to:</strong> <a href="9338.php">George Bosilca: "Re: [OMPI devel] RFC: Fix missing code in MPI_Abort functionality"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="9345.php">Ralph Castain: "Re: [OMPI devel] RFC: Fix missing code in MPI_Abort functionality"</a>
<li><strong>Reply:</strong> <a href="9345.php">Ralph Castain: "Re: [OMPI devel] RFC: Fix missing code in MPI_Abort functionality"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Ah I see what you are getting at now.
<br>
<p>The construction of the list of connected processes is something I, intentionally, did not modify from the current Open MPI code. The list is calculated based on the locally known set of local and remote process groups attached to the communicator. So this is the set of directly connected processes in the specified communicator known to the calling process at the OMPI level.
<br>
<p>ORTE is asked to abort this defined set of processes. Once those processes are terminated then ORTE needs to eventually inform all of the processes (in the jobid(s) specified - maybe other jobids too?) that these processes have failed/aborted. Upon notification of the failed/aborted processes the local process (at the OMPI level) needs to determine if that process loss is critical based upon the error handlers attached to communicators that it shares with the failed/aborted processes.  That should be handled in the callback from the errmgr at the OMPI level, since connectedness is an MPI construct. If the process failure/abort is critical to the local process, then upon notification the local process can call abort on the communicator effected.
<br>
<p>So this has the possibility for a rolling abort effect [the abort of one communicator triggers the abort of another due to MPI_ERR_ARE_FATAL]. From which (depending upon the error handlers at the user level) the system will eventually converge to either some stable subset of process or all processes aborting resulting in job termination.
<br>
<p>The rolling abort effect relies heavily upon the ability of the runtime to make sure that all process failures/abort are eventually known to all alive processes. Since all alive processes will know of the failure/abort, it can then determine if they are transitively effected by the failure based upon the local list of communicators and associated error handlers. But to complete this aspect of the abort procedure, we do need the callback mechanism from the runtime - but since ORTE (today) will kill the job for OMPI then it is not a big deal for end users since the job will terminate anyway. Once we have the callback, then we can finish tightening up the OMPI layer code.
<br>
<p>It is not perfect, but I think it does address the transitive nature of the connectivity of MPI processes by relying on the runtime to provide uniform notification of failures. I figure that we will need to look over this code again and verify that the implementation of MPI_Comm_disconnect and associated underpinnings do the 'right thing' with regard to updating the communicator structures. But I think that is best addressed as a second set of patches.
<br>
<p><p>The goal of this patch is to put back in functionality that was commented out during the last reorganization of the errmgr. What will likely follow, once we have notification of failure/abort at the OMPI level, is a cleanup of the connected groups code paths.
<br>
<p><p>-- Josh
<br>
<p><p>On Jun 9, 2011, at 6:13 PM, George Bosilca wrote:
<br>
<p><span class="quotelev1">&gt; What I'm saying is that there is no reason to have any other type of MPI_Abort if we are not able to compute the set of connected processes. 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; With this RFC the processes on the communicator on MPI_Abort will abort. Then the other processes in the same MPI_COMM_WORLD (in fact jobid) will be notified (if we suppose that the ORTE will not make a difference between aborted and faulty). As a result the entire MPI_COMM_WORLD will be aborted, if we consider a sane application where everyone use the same type of error handler. However, this is not enough. We have to distribute the abort signal to every other process &quot;connected&quot;, and I don't see how we can compute this list of connected processes in Open MPI today.It is not that I don't see it in your patch, it is that the definition of the connectivity in the MPI standard is transitive and relies heavily on a correct implementation for the MPI_Comm_disconnect.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt;  george.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Jun 9, 2011, at 16:59 , Josh Hursey wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On Thu, Jun 9, 2011 at 4:47 PM, George Bosilca &lt;bosilca_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; If this change the behavior of MPI_Abort to only abort processes on the specified communicator how this doesn't affects the default user experience (when today it aborts everything)?
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Open MPI does abort everything by default - decided by the runtime at
</span><br>
<span class="quotelev2">&gt;&gt; the moment (but addressed in your RFC). So it does not matter if one
</span><br>
<span class="quotelev2">&gt;&gt; process aborts or if many do. So the behavior of MPI_Abort experienced
</span><br>
<span class="quotelev2">&gt;&gt; by the user will not change. Effectively the only change is an extra
</span><br>
<span class="quotelev2">&gt;&gt; message in the runtime before the process actually calls
</span><br>
<span class="quotelev2">&gt;&gt; errmgr.abort().
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; This branch just makes the implementation complete by first telling
</span><br>
<span class="quotelev2">&gt;&gt; ORTE that a group of processes, defined by the communicator, should be
</span><br>
<span class="quotelev2">&gt;&gt; terminated along with the calling process. Currently ORTE notices that
</span><br>
<span class="quotelev2">&gt;&gt; there was an abort, and terminates the job. Once your RFC goes through
</span><br>
<span class="quotelev2">&gt;&gt; then this may no longer be the case, and OMPI can determine what to do
</span><br>
<span class="quotelev2">&gt;&gt; when it receives a process failure notification.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; If we accept the fact that MPI_Abort will only abort the processes in the current communicator what happens with the other processes in the same MPI_COMM_WORLD (but not on the communicator that has been used by MPI_Abort)?
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Currently, ORTE will abort them as well. When your RFC goes through
</span><br>
<span class="quotelev2">&gt;&gt; then the OMPI layer will be notified of the error and can take the
</span><br>
<span class="quotelev2">&gt;&gt; appropriate action, as determined by the MPI standard.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; What about all the other connected processes (based on the connectivity as defined in the MPI standard in Section 10.5.4) ? Do they see this as a fault?
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; They are informed of the fault via the ORTE errmgr callback routine
</span><br>
<span class="quotelev2">&gt;&gt; (that we have an RFC for), and then can take the appropriate action
</span><br>
<span class="quotelev2">&gt;&gt; based on MPI semantics. So we are pushing the decision of the
</span><br>
<span class="quotelev2">&gt;&gt; implication of the fault to the OMPI layer - where it should be.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; The remainder of the OMPI layer logic for MPI_ERRORS_RETURN and other
</span><br>
<span class="quotelev2">&gt;&gt; connected error management scenarios is not included in this patch
</span><br>
<span class="quotelev2">&gt;&gt; since that depends on there being a callback to the OMPI layer - which
</span><br>
<span class="quotelev2">&gt;&gt; does not exist just yet. So a small patch to wire in the ORTE piece to
</span><br>
<span class="quotelev2">&gt;&gt; allow the OMPI layer to request a set of processes to be terminated -
</span><br>
<span class="quotelev2">&gt;&gt; to more accurately support MPI_Abort semantics.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Does that answer your questions?
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; -- Josh
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; george.
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Jun 9, 2011, at 16:32 , Josh Hursey wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; WHAT: Fix missing code in MPI_Abort
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; WHY: MPI_Abort is missing logic to ask for termination of the process
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; group defined by the communicator
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; WHERE: Mostly orte/mca/errmgr
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; WHEN: Open MPI trunk
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; TIMEOUT: Tuesday, June 14, 2011 (after teleconf)
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Details:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; -------------------------------------------
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; A bitbucket branch is available here (last sync to r24757 of trunk)
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; <a href="https://bitbucket.org/jjhursey/ompi-abort/">https://bitbucket.org/jjhursey/ompi-abort/</a>
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; In the MPI Standard (v2.2) Section 8.7 after the introduction of
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; MPI_Abort, it states:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; &quot;This routine makes a best attempt to abort all tasks in the group of comm.&quot;
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Open MPI currently only calls orte_errmgr.abort() to abort the calling
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; process itself. The code to ask for the abort of the other processes
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; in the group defined by the communicator is commented out. Since one
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; process calling abort currently causes all processes in the job to
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; abort, it has not been a big deal. However as the group starts
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; exploring better resilience in the OMPI layer (with further support
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; from the ORTE layer) this aspect of MPI_Abort will become more
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; necessary to get right.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; This branch adds back the logic necessary for a single process calling
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; MPI_Abort to request, from ORTE errmgr, that a defined subgroup of
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; processes be aborted. Once the request is sent to the HNP, the local
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; process then calls abort on itself. The HNP requests that the defined
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; subgroup of processes be terminated using the existing plm mechanisms
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; for doing so.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; This change has no effect on the current default user experienced
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; behavior of MPI_Abort.
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
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
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
<span class="quotelev1">&gt; 
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="9341.php">Joshua Hursey: "Re: [OMPI devel] RFC: Resilient ORTE"</a>
<li><strong>Previous message:</strong> <a href="9339.php">George Bosilca: "Re: [OMPI devel] RFC: Resilient ORTE"</a>
<li><strong>In reply to:</strong> <a href="9338.php">George Bosilca: "Re: [OMPI devel] RFC: Fix missing code in MPI_Abort functionality"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="9345.php">Ralph Castain: "Re: [OMPI devel] RFC: Fix missing code in MPI_Abort functionality"</a>
<li><strong>Reply:</strong> <a href="9345.php">Ralph Castain: "Re: [OMPI devel] RFC: Fix missing code in MPI_Abort functionality"</a>
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
