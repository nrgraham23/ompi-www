<?
$subject_val = "Re: [OMPI devel] SM component init unload";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Jul  3 22:47:01 2012" -->
<!-- isoreceived="20120704024701" -->
<!-- sent="Tue, 3 Jul 2012 20:46:56 -0600" -->
<!-- isosent="20120704024656" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] SM component init unload" -->
<!-- id="CAMD57oc8zvinOBbnJzL5gi5_Hbwd0kCAWaiuTmBzDEfuxeM9ww_at_mail.gmail.com" -->
<!-- charset="windows-1252" -->
<!-- inreplyto="170015D0-E77A-4104-A1DD-6AD70C738E53_at_eecs.utk.edu" -->
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
<strong>Subject:</strong> Re: [OMPI devel] SM component init unload<br>
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-07-03 22:46:56
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11232.php">Juan A. Rico: "Re: [OMPI devel] SM component init unload"</a>
<li><strong>Previous message:</strong> <a href="11230.php">George Bosilca: "Re: [OMPI devel] SM component init unload"</a>
<li><strong>In reply to:</strong> <a href="11230.php">George Bosilca: "Re: [OMPI devel] SM component init unload"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11232.php">Juan A. Rico: "Re: [OMPI devel] SM component init unload"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Good catch, George - thanks for the detailed explanation. I think what
<br>
happened here was that we changed the ordering in MPI_Init a while back -
<br>
we had always had a rule about when MPI components could access remote proc
<br>
info, but had grown lax about it, so at least some of the BTLs had to be
<br>
fixed at that time. Since nobody really uses SM coll, the fact that it also
<br>
violated the sequencing rules went undetected.
<br>
<p>I'll work with Jeff to fix the initialization sequencing. I can't speak to
<br>
your advice about use in production as you are definitely the expert in
<br>
this area, but we should at least get it to work for those who want to play
<br>
with it.
<br>
<p>Ralph
<br>
<p><p>On Tue, Jul 3, 2012 at 6:59 PM, George Bosilca &lt;bosilca_at_[hidden]&gt; wrote:
<br>
<p><span class="quotelev1">&gt; Juan,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Something weird is going on there. The selection mechanism for the SM coll
</span><br>
<span class="quotelev1">&gt; and SM BTL should be very similar. However, the SM BTL successfully select
</span><br>
<span class="quotelev1">&gt; itself while the SM coll fails to determine that all processes are local.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; In the coll SM the issue is that the remote procs do not have the LOCAL
</span><br>
<span class="quotelev1">&gt; flag set, even when they are on the local node (however the
</span><br>
<span class="quotelev1">&gt; ompi_proc_local() return has a special flag stating that all processes in
</span><br>
<span class="quotelev1">&gt; the job are local). I compared the initialization of the SM BTL and the SM
</span><br>
<span class="quotelev1">&gt; coll. It turns out that somehow the procs returned by ompi_proc_all() and
</span><br>
<span class="quotelev1">&gt; the procs provided to the add_proc of the BTLs are not identical. The
</span><br>
<span class="quotelev1">&gt; second have the local flag correctly set, so I went a little bit deeper.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Here is what I found while toying with gdb inside:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; breakpoint 1, mca_coll_sm_init_query (enable_progress_threads=false,
</span><br>
<span class="quotelev1">&gt; enable_mpi_threads=false) at coll_sm_module.c:132
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; (gdb) p procs[0]
</span><br>
<span class="quotelev1">&gt; $1 = (ompi_proc_t *) 0x109a1e8c0
</span><br>
<span class="quotelev1">&gt; (gdb) p procs[1]
</span><br>
<span class="quotelev1">&gt; $2 = (ompi_proc_t *) 0x109a1e970
</span><br>
<span class="quotelev1">&gt; (gdb) p procs[0]-&gt;proc_flags
</span><br>
<span class="quotelev1">&gt; $3 = 0
</span><br>
<span class="quotelev1">&gt; (gdb) p procs[1]-&gt;proc_flags
</span><br>
<span class="quotelev1">&gt; $4 = 4095
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Breakpoint 2, mca_btl_sm_add_procs (btl=0x109baa1c0, nprocs=2,
</span><br>
<span class="quotelev1">&gt; procs=0x109a319e0, peers=0x109a319f0, reachability=0x7fff691378e8) at
</span><br>
<span class="quotelev1">&gt; btl_sm.c:427
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; (gdb) p procs[0]
</span><br>
<span class="quotelev1">&gt; $5 = (struct ompi_proc_t *) 0x109a1e8c0
</span><br>
<span class="quotelev1">&gt; (gdb) p procs[1]
</span><br>
<span class="quotelev1">&gt; $6 = (struct ompi_proc_t *) 0x109a1e970
</span><br>
<span class="quotelev1">&gt; (gdb) p procs[0]-&gt;proc_flags
</span><br>
<span class="quotelev1">&gt; $7 = 1920
</span><br>
<span class="quotelev1">&gt; (gdb) p procs[1]-&gt;proc_flags
</span><br>
<span class="quotelev1">&gt; $8 = 4095
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Thus the problem seems to come from the fact that during the
</span><br>
<span class="quotelev1">&gt; initialization of the SM coll the flags are not correctly set. However,
</span><br>
<span class="quotelev1">&gt; this is somehow expected &#133; as the call to the initialization happens before
</span><br>
<span class="quotelev1">&gt; the exchange of the business cards (and therefore there is no way to have
</span><br>
<span class="quotelev1">&gt; any knowledge about the remote procs).
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; So, either something changed drastically in the way we set the flags for
</span><br>
<span class="quotelev1">&gt; remote processes or we did not use the SM coll for the last 3 years. I
</span><br>
<span class="quotelev1">&gt; think the culprit is r21967 (
</span><br>
<span class="quotelev1">&gt; <a href="https://svn.open-mpi.org/trac/ompi/changeset/21967">https://svn.open-mpi.org/trac/ompi/changeset/21967</a>) who added a
</span><br>
<span class="quotelev1">&gt; &quot;selection&quot; logic based on knowledge about remote procs in the coll SM
</span><br>
<span class="quotelev1">&gt; initialization function. But this selection logic was way to early !!!
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I would strongly encourage you not to use this SM collective component in
</span><br>
<span class="quotelev1">&gt; anything related to production runs.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;   george.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; PS: However, if you want to toy with the SM coll apply the following patch:
</span><br>
<span class="quotelev1">&gt; Index: coll_sm_module.c
</span><br>
<span class="quotelev1">&gt; ===================================================================
</span><br>
<span class="quotelev1">&gt; --- coll_sm_module.c (revision 26737)
</span><br>
<span class="quotelev1">&gt; +++ coll_sm_module.c (working copy)
</span><br>
<span class="quotelev1">&gt; @@ -128,6 +128,7 @@
</span><br>
<span class="quotelev1">&gt;  int mca_coll_sm_init_query(bool enable_progress_threads,
</span><br>
<span class="quotelev1">&gt;                             bool enable_mpi_threads)
</span><br>
<span class="quotelev1">&gt;  {
</span><br>
<span class="quotelev1">&gt; +#if 0
</span><br>
<span class="quotelev1">&gt;      ompi_proc_t *my_proc, **procs;
</span><br>
<span class="quotelev1">&gt;      size_t i, size;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; @@ -158,7 +159,7 @@
</span><br>
<span class="quotelev1">&gt;                              &quot;coll:sm:init_query: no other local procs;
</span><br>
<span class="quotelev1">&gt; disqualifying myself&quot;);
</span><br>
<span class="quotelev1">&gt;          return OMPI_ERR_NOT_AVAILABLE;
</span><br>
<span class="quotelev1">&gt;      }
</span><br>
<span class="quotelev1">&gt; -
</span><br>
<span class="quotelev1">&gt; +#endif
</span><br>
<span class="quotelev1">&gt;      /* Don't do much here because we don't really want to allocate any
</span><br>
<span class="quotelev1">&gt;         shared memory until this component is selected to be used. */
</span><br>
<span class="quotelev1">&gt;      opal_output_verbose(10, mca_coll_base_output,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Jul 4, 2012, at 02:05 , Ralph Castain wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Okay, please try this again with r26739 or above. You can remove the rest
</span><br>
<span class="quotelev1">&gt; of the &quot;verbose&quot; settings and the --display-map so we declutter the output.
</span><br>
<span class="quotelev1">&gt; Please add &quot;-mca orte_nidmap_verbose 20&quot; to your cmd line.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Thanks!
</span><br>
<span class="quotelev1">&gt; Ralph
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On Tue, Jul 3, 2012 at 1:50 PM, Juan A. Rico &lt;jarico_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Here is the output.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; [jarico_at_Metropolis-01 examples]$
</span><br>
<span class="quotelev2">&gt;&gt; /home/jarico/shared/packages/openmpi-cas-dbg/bin/mpiexec --bind-to-core
</span><br>
<span class="quotelev2">&gt;&gt; --bynode --mca mca_base_verbose 100 --mca mca_coll_base_output 100  --mca
</span><br>
<span class="quotelev2">&gt;&gt; coll_sm_priority 99 -mca hwloc_base_verbose 90 --display-map --mca
</span><br>
<span class="quotelev2">&gt;&gt; mca_verbose 100 --mca mca_base_verbose 100 --mca coll_base_verbose 100 -n 2
</span><br>
<span class="quotelev2">&gt;&gt; -mca grpcomm_base_verbose 5 ./bmem
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] mca: base: components_open: Looking for hwloc
</span><br>
<span class="quotelev2">&gt;&gt; components
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] mca: base: components_open: opening hwloc components
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] mca: base: components_open: found loaded component
</span><br>
<span class="quotelev2">&gt;&gt; hwloc142
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] mca: base: components_open: component hwloc142 has
</span><br>
<span class="quotelev2">&gt;&gt; no register function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] mca: base: components_open: component hwloc142 has
</span><br>
<span class="quotelev2">&gt;&gt; no open function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base:get_topology
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base: no cpus specified - using root
</span><br>
<span class="quotelev2">&gt;&gt; available cpuset
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] mca:base:select:(grpcomm) Querying component [bad]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] mca:base:select:(grpcomm) Query of component [bad]
</span><br>
<span class="quotelev2">&gt;&gt; set priority to 10
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] mca:base:select:(grpcomm) Selected component [bad]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:base:receive start comm
</span><br>
<span class="quotelev2">&gt;&gt; --------------------------------------------------------------------------
</span><br>
<span class="quotelev2">&gt;&gt; WARNING: a request was made to bind a process. While the system
</span><br>
<span class="quotelev2">&gt;&gt; supports binding the process itself, at least one node does NOT
</span><br>
<span class="quotelev2">&gt;&gt; support binding memory to the process location.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;   Node:  Metropolis-01
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; This is a warning only; your job will continue, though performance may
</span><br>
<span class="quotelev2">&gt;&gt; be degraded.
</span><br>
<span class="quotelev2">&gt;&gt; --------------------------------------------------------------------------
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base: get available cpus
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base:filter_cpus specified - already done
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base: get available cpus
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base:filter_cpus specified - already done
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base: get available cpus
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base:filter_cpus specified - already done
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base: get available cpus
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base:filter_cpus specified - already done
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base: get available cpus
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base:filter_cpus specified - already done
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base: get available cpus
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base:filter_cpus specified - already done
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base: get available cpus
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base:filter_cpus specified - already done
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base: get available cpus
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base:filter_cpus specified - already done
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base:get_nbojbs computed data 8 of Core:0
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base: get available cpus
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base:filter_cpus specified - already done
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base: get available cpus
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] hwloc:base:filter_cpus specified - already done
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;  ========================   JOB MAP   ========================
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;  Data for node: Metropolis-01   Num procs: 2
</span><br>
<span class="quotelev2">&gt;&gt;         Process OMPI jobid: [36265,1] App: 0 Process rank: 0
</span><br>
<span class="quotelev2">&gt;&gt;         Process OMPI jobid: [36265,1] App: 0 Process rank: 1
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;  =============================================================
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:bad:xcast sent to job
</span><br>
<span class="quotelev2">&gt;&gt; [36265,0] tag 1
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:xcast:recv:send_relay
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:base:xcast updating daemon
</span><br>
<span class="quotelev2">&gt;&gt; nidmap
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] orte:daemon:send_relay - recipient
</span><br>
<span class="quotelev2">&gt;&gt; list is empty!
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: Looking for hwloc
</span><br>
<span class="quotelev2">&gt;&gt; components
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: opening hwloc components
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: found loaded component
</span><br>
<span class="quotelev2">&gt;&gt; hwloc142
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: component hwloc142 has
</span><br>
<span class="quotelev2">&gt;&gt; no register function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: component hwloc142 has
</span><br>
<span class="quotelev2">&gt;&gt; no open function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: Looking for hwloc
</span><br>
<span class="quotelev2">&gt;&gt; components
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: opening hwloc components
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: found loaded component
</span><br>
<span class="quotelev2">&gt;&gt; hwloc142
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: component hwloc142 has
</span><br>
<span class="quotelev2">&gt;&gt; no register function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: component hwloc142 has
</span><br>
<span class="quotelev2">&gt;&gt; no open function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca:base:select:(grpcomm) Querying component [bad]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca:base:select:(grpcomm) Query of component [bad]
</span><br>
<span class="quotelev2">&gt;&gt; set priority to 10
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca:base:select:(grpcomm) Selected component [bad]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:base:receive start comm
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] computing locality - getting object at level CORE,
</span><br>
<span class="quotelev2">&gt;&gt; index 0
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] hwloc:base: get available cpus
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] hwloc:base:get_available_cpus first time -
</span><br>
<span class="quotelev2">&gt;&gt; filtering cpus
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] hwloc:base: no cpus specified - using root
</span><br>
<span class="quotelev2">&gt;&gt; available cpuset
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] computing locality - getting object at level CORE,
</span><br>
<span class="quotelev2">&gt;&gt; index 1
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] hwloc:base: get available cpus
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] hwloc:base:filter_cpus specified - already done
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] computing locality - shifting up from L1CACHE
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] computing locality - shifting up from L2CACHE
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] computing locality - shifting up from L3CACHE
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] computing locality - filling level SOCKET
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] computing locality - filling level NUMA
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] locality: CL:CU:N:B:Nu:S
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca:base:select:(grpcomm) Querying component [bad]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca:base:select:(grpcomm) Query of component [bad]
</span><br>
<span class="quotelev2">&gt;&gt; set priority to 10
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca:base:select:(grpcomm) Selected component [bad]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:base:receive start comm
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: Looking for coll
</span><br>
<span class="quotelev2">&gt;&gt; components
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: opening coll components
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: found loaded component
</span><br>
<span class="quotelev2">&gt;&gt; tuned
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: component tuned has no
</span><br>
<span class="quotelev2">&gt;&gt; register function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:tuned:component_open: done!
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: component tuned open
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: found loaded component
</span><br>
<span class="quotelev2">&gt;&gt; sm
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: component sm register
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: component sm has no
</span><br>
<span class="quotelev2">&gt;&gt; open function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: found loaded component
</span><br>
<span class="quotelev2">&gt;&gt; libnbc
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: component libnbc
</span><br>
<span class="quotelev2">&gt;&gt; register function successful
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: component libnbc open
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: found loaded component
</span><br>
<span class="quotelev2">&gt;&gt; hierarch
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: component hierarch has
</span><br>
<span class="quotelev2">&gt;&gt; no register function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: component hierarch open
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: found loaded component
</span><br>
<span class="quotelev2">&gt;&gt; basic
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: component basic
</span><br>
<span class="quotelev2">&gt;&gt; register function successful
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: component basic has no
</span><br>
<span class="quotelev2">&gt;&gt; open function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: found loaded component
</span><br>
<span class="quotelev2">&gt;&gt; inter
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: component inter has no
</span><br>
<span class="quotelev2">&gt;&gt; register function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: component inter open
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: found loaded component
</span><br>
<span class="quotelev2">&gt;&gt; self
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: component self has no
</span><br>
<span class="quotelev2">&gt;&gt; register function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: components_open: component self open
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] computing locality - getting object at level CORE,
</span><br>
<span class="quotelev2">&gt;&gt; index 1
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] hwloc:base: get available cpus
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] hwloc:base:get_available_cpus first time -
</span><br>
<span class="quotelev2">&gt;&gt; filtering cpus
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] hwloc:base: no cpus specified - using root
</span><br>
<span class="quotelev2">&gt;&gt; available cpuset
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] hwloc:base: get available cpus
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] hwloc:base:filter_cpus specified - already done
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] computing locality - getting object at level CORE,
</span><br>
<span class="quotelev2">&gt;&gt; index 0
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] computing locality - shifting up from L1CACHE
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] computing locality - shifting up from L2CACHE
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] computing locality - shifting up from L3CACHE
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] computing locality - filling level SOCKET
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] computing locality - filling level NUMA
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] locality: CL:CU:N:B:Nu:S
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] COLLECTIVE RECVD FROM [[36265,1],0]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] WORKING COLLECTIVE 0
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] ADDING [[36265,1],WILDCARD] TO
</span><br>
<span class="quotelev2">&gt;&gt; PARTICIPANTS
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] PROGRESSING COLLECTIVE 0
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] PROGRESSING COLL id 0
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] ALL LOCAL PROCS CONTRIBUTE 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:base:modex: performing modex
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:base:pack_modex: reporting 4
</span><br>
<span class="quotelev2">&gt;&gt; entries
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:base:full:modex: executing
</span><br>
<span class="quotelev2">&gt;&gt; allgather
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:bad entering allgather
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:bad allgather underway
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:base:modex: modex posted
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: Looking for coll
</span><br>
<span class="quotelev2">&gt;&gt; components
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: opening coll components
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: found loaded component
</span><br>
<span class="quotelev2">&gt;&gt; tuned
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: component tuned has no
</span><br>
<span class="quotelev2">&gt;&gt; register function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:tuned:component_open: done!
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: component tuned open
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: found loaded component
</span><br>
<span class="quotelev2">&gt;&gt; sm
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: component sm register
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: component sm has no
</span><br>
<span class="quotelev2">&gt;&gt; open function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: found loaded component
</span><br>
<span class="quotelev2">&gt;&gt; libnbc
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: component libnbc
</span><br>
<span class="quotelev2">&gt;&gt; register function successful
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: component libnbc open
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: found loaded component
</span><br>
<span class="quotelev2">&gt;&gt; hierarch
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: component hierarch has
</span><br>
<span class="quotelev2">&gt;&gt; no register function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: component hierarch open
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: found loaded component
</span><br>
<span class="quotelev2">&gt;&gt; basic
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: component basic
</span><br>
<span class="quotelev2">&gt;&gt; register function successful
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: component basic has no
</span><br>
<span class="quotelev2">&gt;&gt; open function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: found loaded component
</span><br>
<span class="quotelev2">&gt;&gt; inter
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: component inter has no
</span><br>
<span class="quotelev2">&gt;&gt; register function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: component inter open
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: found loaded component
</span><br>
<span class="quotelev2">&gt;&gt; self
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: component self has no
</span><br>
<span class="quotelev2">&gt;&gt; register function
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: components_open: component self open
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] COLLECTIVE RECVD FROM [[36265,1],1]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] WORKING COLLECTIVE 0
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] PROGRESSING COLLECTIVE 0
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] PROGRESSING COLL id 0
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] ALL LOCAL PROCS CONTRIBUTE 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] COLLECTIVE 0 LOCALLY COMPLETE -
</span><br>
<span class="quotelev2">&gt;&gt; SENDING TO GLOBAL COLLECTIVE
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:base:daemon_coll: daemon
</span><br>
<span class="quotelev2">&gt;&gt; collective recvd from [[36265,0],0]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:base:daemon_coll: WORKING
</span><br>
<span class="quotelev2">&gt;&gt; COLLECTIVE 0
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:base:daemon_coll: NUM
</span><br>
<span class="quotelev2">&gt;&gt; CONTRIBS: 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:bad:xcast sent to job
</span><br>
<span class="quotelev2">&gt;&gt; [36265,1] tag 30
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:xcast:recv:send_relay
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] orte:daemon:send_relay - recipient
</span><br>
<span class="quotelev2">&gt;&gt; list is empty!
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:base:modex: performing modex
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:base:pack_modex: reporting 4
</span><br>
<span class="quotelev2">&gt;&gt; entries
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:base:full:modex: executing
</span><br>
<span class="quotelev2">&gt;&gt; allgather
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:bad entering allgather
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:bad allgather underway
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:base:modex: modex posted
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:base:receive processing
</span><br>
<span class="quotelev2">&gt;&gt; collective return for id 0
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] CHECKING COLL id 0
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] STORING MODEX DATA
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:base:store_modex adding modex
</span><br>
<span class="quotelev2">&gt;&gt; entry for proc [[36265,1],0]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:base:receive processing
</span><br>
<span class="quotelev2">&gt;&gt; collective return for id 0
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] CHECKING COLL id 0
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] STORING MODEX DATA
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:base:store_modex adding modex
</span><br>
<span class="quotelev2">&gt;&gt; entry for proc [[36265,1],0]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:base:update_modex_entries:
</span><br>
<span class="quotelev2">&gt;&gt; adding 4 entries for proc [[36265,1],0]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:base:store_modex adding modex
</span><br>
<span class="quotelev2">&gt;&gt; entry for proc [[36265,1],1]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:base:update_modex_entries:
</span><br>
<span class="quotelev2">&gt;&gt; adding 4 entries for proc [[36265,1],1]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:base:update_modex_entries:
</span><br>
<span class="quotelev2">&gt;&gt; adding 4 entries for proc [[36265,1],0]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:base:store_modex adding modex
</span><br>
<span class="quotelev2">&gt;&gt; entry for proc [[36265,1],1]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:base:update_modex_entries:
</span><br>
<span class="quotelev2">&gt;&gt; adding 4 entries for proc [[36265,1],1]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:find_available: querying coll component tuned
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:find_available: coll component tuned is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:find_available: querying coll component tuned
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:find_available: coll component tuned is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:find_available: querying coll component sm
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:find_available: querying coll component sm
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:sm:init_query: no other local procs;
</span><br>
<span class="quotelev2">&gt;&gt; disqualifying myself
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:find_available: coll component sm is not
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:find_available: querying coll component libnbc
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:find_available: coll component libnbc is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:find_available: querying coll component
</span><br>
<span class="quotelev2">&gt;&gt; hierarch
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:find_available: coll component hierarch is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:find_available: querying coll component basic
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:find_available: coll component basic is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:sm:init_query: no other local procs;
</span><br>
<span class="quotelev2">&gt;&gt; disqualifying myself
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:find_available: coll component sm is not
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:find_available: querying coll component libnbc
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:find_available: coll component libnbc is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:find_available: querying coll component
</span><br>
<span class="quotelev2">&gt;&gt; hierarch
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:find_available: coll component hierarch is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:find_available: querying coll component basic
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:find_available: coll component basic is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:find_available: querying coll component inter
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:find_available: coll component inter is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:find_available: querying coll component self
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:find_available: coll component self is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:find_available: querying coll component inter
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:find_available: coll component inter is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:find_available: querying coll component self
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:find_available: coll component self is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] hwloc:base:get_nbojbs computed data 0 of NUMANode:0
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] hwloc:base:get_nbojbs computed data 0 of NUMANode:0
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] COLLECTIVE RECVD FROM [[36265,1],1]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] WORKING COLLECTIVE 1
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] ADDING [[36265,1],WILDCARD] TO
</span><br>
<span class="quotelev2">&gt;&gt; PARTICIPANTS
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] PROGRESSING COLLECTIVE 1
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] PROGRESSING COLL id 1
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] ALL LOCAL PROCS CONTRIBUTE 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] COLLECTIVE RECVD FROM [[36265,1],0]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] WORKING COLLECTIVE 1
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] PROGRESSING COLLECTIVE 1
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] PROGRESSING COLL id 1
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] ALL LOCAL PROCS CONTRIBUTE 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] COLLECTIVE 1 LOCALLY COMPLETE -
</span><br>
<span class="quotelev2">&gt;&gt; SENDING TO GLOBAL COLLECTIVE
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:base:daemon_coll: daemon
</span><br>
<span class="quotelev2">&gt;&gt; collective recvd from [[36265,0],0]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:base:daemon_coll: WORKING
</span><br>
<span class="quotelev2">&gt;&gt; COLLECTIVE 1
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:base:daemon_coll: NUM
</span><br>
<span class="quotelev2">&gt;&gt; CONTRIBS: 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:bad:xcast sent to job
</span><br>
<span class="quotelev2">&gt;&gt; [36265,1] tag 30
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:xcast:recv:send_relay
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] orte:daemon:send_relay - recipient
</span><br>
<span class="quotelev2">&gt;&gt; list is empty!
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:bad entering barrier
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:bad barrier underway
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:bad entering barrier
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:bad barrier underway
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:base:receive processing
</span><br>
<span class="quotelev2">&gt;&gt; collective return for id 1
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] CHECKING COLL id 1
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:base:receive processing
</span><br>
<span class="quotelev2">&gt;&gt; collective return for id 1
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] CHECKING COLL id 1
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:base:comm_select: new communicator:
</span><br>
<span class="quotelev2">&gt;&gt; MPI_COMM_WORLD (cid 0)
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:base:comm_select: Checking all available
</span><br>
<span class="quotelev2">&gt;&gt; modules
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:tuned:module_tuned query called
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:base:comm_select: component available: tuned,
</span><br>
<span class="quotelev2">&gt;&gt; priority: 30
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:base:comm_select: component available: libnbc,
</span><br>
<span class="quotelev2">&gt;&gt; priority: 10
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; hierarch
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:base:comm_select: component available: basic,
</span><br>
<span class="quotelev2">&gt;&gt; priority: 10
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; inter
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:base:comm_select: component not available: self
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:tuned:module_init called.
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:tuned:module_init Tuned is in use
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:base:comm_select: new communicator:
</span><br>
<span class="quotelev2">&gt;&gt; MPI_COMM_SELF (cid 1)
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:base:comm_select: Checking all available
</span><br>
<span class="quotelev2">&gt;&gt; modules
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:base:comm_select: new communicator:
</span><br>
<span class="quotelev2">&gt;&gt; MPI_COMM_WORLD (cid 0)
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:base:comm_select: Checking all available
</span><br>
<span class="quotelev2">&gt;&gt; modules
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:tuned:module_tuned query called
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:base:comm_select: component available: tuned,
</span><br>
<span class="quotelev2">&gt;&gt; priority: 30
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:base:comm_select: component available: libnbc,
</span><br>
<span class="quotelev2">&gt;&gt; priority: 10
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; hierarch
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:base:comm_select: component available: basic,
</span><br>
<span class="quotelev2">&gt;&gt; priority: 10
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; inter
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:base:comm_select: component not available: self
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:tuned:module_init called.
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:tuned:module_tuned query called
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; tuned
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:base:comm_select: component available: libnbc,
</span><br>
<span class="quotelev2">&gt;&gt; priority: 10
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; hierarch
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:base:comm_select: component available: basic,
</span><br>
<span class="quotelev2">&gt;&gt; priority: 10
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; inter
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:base:comm_select: component available: self,
</span><br>
<span class="quotelev2">&gt;&gt; priority: 75
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:tuned:module_init Tuned is in use
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:base:comm_select: new communicator:
</span><br>
<span class="quotelev2">&gt;&gt; MPI_COMM_SELF (cid 1)
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:base:comm_select: Checking all available
</span><br>
<span class="quotelev2">&gt;&gt; modules
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:tuned:module_tuned query called
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; tuned
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:base:comm_select: component available: libnbc,
</span><br>
<span class="quotelev2">&gt;&gt; priority: 10
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; hierarch
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:base:comm_select: component available: basic,
</span><br>
<span class="quotelev2">&gt;&gt; priority: 10
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; inter
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:base:comm_select: component available: self,
</span><br>
<span class="quotelev2">&gt;&gt; priority: 75
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:bad entering barrier
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] COLLECTIVE RECVD FROM [[36265,1],1]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] WORKING COLLECTIVE 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] ADDING [[36265,1],WILDCARD] TO
</span><br>
<span class="quotelev2">&gt;&gt; PARTICIPANTS
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] PROGRESSING COLLECTIVE 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] PROGRESSING COLL id 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] ALL LOCAL PROCS CONTRIBUTE 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] COLLECTIVE RECVD FROM [[36265,1],0]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] WORKING COLLECTIVE 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] PROGRESSING COLLECTIVE 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] PROGRESSING COLL id 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] ALL LOCAL PROCS CONTRIBUTE 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] COLLECTIVE 2 LOCALLY COMPLETE -
</span><br>
<span class="quotelev2">&gt;&gt; SENDING TO GLOBAL COLLECTIVE
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:base:daemon_coll: daemon
</span><br>
<span class="quotelev2">&gt;&gt; collective recvd from [[36265,0],0]
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:base:daemon_coll: WORKING
</span><br>
<span class="quotelev2">&gt;&gt; COLLECTIVE 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:base:daemon_coll: NUM
</span><br>
<span class="quotelev2">&gt;&gt; CONTRIBS: 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:bad:xcast sent to job
</span><br>
<span class="quotelev2">&gt;&gt; [36265,1] tag 30
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:xcast:recv:send_relay
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] orte:daemon:send_relay - recipient
</span><br>
<span class="quotelev2">&gt;&gt; list is empty!
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:bad entering barrier
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:bad barrier underway
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:base:receive processing
</span><br>
<span class="quotelev2">&gt;&gt; collective return for id 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] CHECKING COLL id 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:bad barrier underway
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:base:receive processing
</span><br>
<span class="quotelev2">&gt;&gt; collective return for id 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] CHECKING COLL id 2
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:tuned:component_close: called
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] coll:tuned:component_close: done!
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: close: component tuned closed
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: close: unloading component tuned
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: close: component libnbc closed
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: close: unloading component libnbc
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: close: unloading component hierarch
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: close: unloading component basic
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: close: unloading component inter
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] mca: base: close: unloading component self
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24565] [[36265,1],1] grpcomm:base:receive stop comm
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:tuned:component_close: called
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] coll:tuned:component_close: done!
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: close: component tuned closed
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: close: unloading component tuned
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: close: component libnbc closed
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: close: unloading component libnbc
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: close: unloading component hierarch
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: close: unloading component basic
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: close: unloading component inter
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] mca: base: close: unloading component self
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24564] [[36265,1],0] grpcomm:base:receive stop comm
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:bad:xcast sent to job
</span><br>
<span class="quotelev2">&gt;&gt; [36265,0] tag 1
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] grpcomm:xcast:recv:send_relay
</span><br>
<span class="quotelev2">&gt;&gt; [Metropolis-01:24563] [[36265,0],0] orte:daemon:send_relay - recipient
</span><br>
<span class="quotelev2">&gt;&gt; list is empty!
</span><br>
<span class="quotelev2">&gt;&gt; [jarico_at_Metropolis-01 examples]$
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; El 03/07/2012, a las 21:44, Ralph Castain escribi&#243;:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; Interesting - yes, coll sm doesn't think they are on the same node for
</span><br>
<span class="quotelev2">&gt;&gt; some reason. Try adding -mca grpcomm_base_verbose 5 and let's see why
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; On Jul 3, 2012, at 1:24 PM, Juan Antonio Rico Gallego wrote:
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; The code I run is a simple broadcast.
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; When I do not specify components to run, the output is (more verbose):
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [jarico_at_Metropolis-01 examples]$
</span><br>
<span class="quotelev2">&gt;&gt; /home/jarico/shared/packages/openmpi-cas-dbg/bin/mpiexec --mca
</span><br>
<span class="quotelev2">&gt;&gt; mca_base_verbose 100 --mca mca_coll_base_output 100  --mca coll_sm_priority
</span><br>
<span class="quotelev2">&gt;&gt; 99 -mca hwloc_base_verbose 90 --display-map --mca mca_verbose 100 --mca
</span><br>
<span class="quotelev2">&gt;&gt; mca_base_verbose 100 --mca coll_base_verbose 100 -n 2 ./bmem
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24490] mca: base: components_open: Looking for hwloc
</span><br>
<span class="quotelev2">&gt;&gt; components
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24490] mca: base: components_open: opening hwloc
</span><br>
<span class="quotelev2">&gt;&gt; components
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24490] mca: base: components_open: found loaded
</span><br>
<span class="quotelev2">&gt;&gt; component hwloc142
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24490] mca: base: components_open: component hwloc142
</span><br>
<span class="quotelev2">&gt;&gt; has no register function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24490] mca: base: components_open: component hwloc142
</span><br>
<span class="quotelev2">&gt;&gt; has no open function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24490] hwloc:base:get_topology
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24490] hwloc:base: no cpus specified - using root
</span><br>
<span class="quotelev2">&gt;&gt; available cpuset
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; ========================   JOB MAP   ========================
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; Data for node: Metropolis-01 Num procs: 2
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;      Process OMPI jobid: [36336,1] App: 0 Process rank: 0
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;      Process OMPI jobid: [36336,1] App: 0 Process rank: 1
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; =============================================================
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: Looking for hwloc
</span><br>
<span class="quotelev2">&gt;&gt; components
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: opening hwloc
</span><br>
<span class="quotelev2">&gt;&gt; components
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: found loaded
</span><br>
<span class="quotelev2">&gt;&gt; component hwloc142
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: component hwloc142
</span><br>
<span class="quotelev2">&gt;&gt; has no register function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: component hwloc142
</span><br>
<span class="quotelev2">&gt;&gt; has no open function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: Looking for hwloc
</span><br>
<span class="quotelev2">&gt;&gt; components
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: opening hwloc
</span><br>
<span class="quotelev2">&gt;&gt; components
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: found loaded
</span><br>
<span class="quotelev2">&gt;&gt; component hwloc142
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: component hwloc142
</span><br>
<span class="quotelev2">&gt;&gt; has no register function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: component hwloc142
</span><br>
<span class="quotelev2">&gt;&gt; has no open function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] locality: CL:CU:N:B
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] hwloc:base: get available cpus
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] hwloc:base:get_available_cpus first time -
</span><br>
<span class="quotelev2">&gt;&gt; filtering cpus
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] hwloc:base: no cpus specified - using root
</span><br>
<span class="quotelev2">&gt;&gt; available cpuset
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] hwloc:base:get_available_cpus root object
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: Looking for coll
</span><br>
<span class="quotelev2">&gt;&gt; components
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: opening coll
</span><br>
<span class="quotelev2">&gt;&gt; components
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: found loaded
</span><br>
<span class="quotelev2">&gt;&gt; component tuned
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: component tuned has
</span><br>
<span class="quotelev2">&gt;&gt; no register function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:tuned:component_open: done!
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: component tuned open
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: found loaded
</span><br>
<span class="quotelev2">&gt;&gt; component sm
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: component sm
</span><br>
<span class="quotelev2">&gt;&gt; register function successful
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: component sm has no
</span><br>
<span class="quotelev2">&gt;&gt; open function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: found loaded
</span><br>
<span class="quotelev2">&gt;&gt; component libnbc
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: component libnbc
</span><br>
<span class="quotelev2">&gt;&gt; register function successful
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: component libnbc
</span><br>
<span class="quotelev2">&gt;&gt; open function successful
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: found loaded
</span><br>
<span class="quotelev2">&gt;&gt; component hierarch
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: component hierarch
</span><br>
<span class="quotelev2">&gt;&gt; has no register function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: component hierarch
</span><br>
<span class="quotelev2">&gt;&gt; open function successful
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: found loaded
</span><br>
<span class="quotelev2">&gt;&gt; component basic
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: component basic
</span><br>
<span class="quotelev2">&gt;&gt; register function successful
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: component basic has
</span><br>
<span class="quotelev2">&gt;&gt; no open function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: found loaded
</span><br>
<span class="quotelev2">&gt;&gt; component inter
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: component inter has
</span><br>
<span class="quotelev2">&gt;&gt; no register function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: component inter open
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: found loaded
</span><br>
<span class="quotelev2">&gt;&gt; component self
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: component self has
</span><br>
<span class="quotelev2">&gt;&gt; no register function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: components_open: component self open
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] locality: CL:CU:N:B
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] hwloc:base: get available cpus
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] hwloc:base:get_available_cpus first time -
</span><br>
<span class="quotelev2">&gt;&gt; filtering cpus
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] hwloc:base: no cpus specified - using root
</span><br>
<span class="quotelev2">&gt;&gt; available cpuset
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] hwloc:base:get_available_cpus root object
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: Looking for coll
</span><br>
<span class="quotelev2">&gt;&gt; components
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: opening coll
</span><br>
<span class="quotelev2">&gt;&gt; components
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: found loaded
</span><br>
<span class="quotelev2">&gt;&gt; component tuned
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: component tuned has
</span><br>
<span class="quotelev2">&gt;&gt; no register function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:tuned:component_open: done!
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: component tuned open
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: found loaded
</span><br>
<span class="quotelev2">&gt;&gt; component sm
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: component sm
</span><br>
<span class="quotelev2">&gt;&gt; register function successful
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: component sm has no
</span><br>
<span class="quotelev2">&gt;&gt; open function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: found loaded
</span><br>
<span class="quotelev2">&gt;&gt; component libnbc
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: component libnbc
</span><br>
<span class="quotelev2">&gt;&gt; register function successful
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: component libnbc
</span><br>
<span class="quotelev2">&gt;&gt; open function successful
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: found loaded
</span><br>
<span class="quotelev2">&gt;&gt; component hierarch
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: component hierarch
</span><br>
<span class="quotelev2">&gt;&gt; has no register function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: component hierarch
</span><br>
<span class="quotelev2">&gt;&gt; open function successful
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: found loaded
</span><br>
<span class="quotelev2">&gt;&gt; component basic
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: component basic
</span><br>
<span class="quotelev2">&gt;&gt; register function successful
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: component basic has
</span><br>
<span class="quotelev2">&gt;&gt; no open function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: found loaded
</span><br>
<span class="quotelev2">&gt;&gt; component inter
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: component inter has
</span><br>
<span class="quotelev2">&gt;&gt; no register function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: component inter open
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: found loaded
</span><br>
<span class="quotelev2">&gt;&gt; component self
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: component self has
</span><br>
<span class="quotelev2">&gt;&gt; no register function
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: components_open: component self open
</span><br>
<span class="quotelev2">&gt;&gt; function successful
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:find_available: querying coll component
</span><br>
<span class="quotelev2">&gt;&gt; tuned
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:find_available: coll component tuned is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:find_available: querying coll component sm
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:sm:init_query: no other local procs;
</span><br>
<span class="quotelev2">&gt;&gt; disqualifying myself
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:find_available: coll component sm is not
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:find_available: querying coll component
</span><br>
<span class="quotelev2">&gt;&gt; libnbc
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:find_available: coll component libnbc is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:find_available: querying coll component
</span><br>
<span class="quotelev2">&gt;&gt; hierarch
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:find_available: coll component hierarch is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:find_available: querying coll component
</span><br>
<span class="quotelev2">&gt;&gt; basic
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:find_available: coll component basic is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:find_available: querying coll component
</span><br>
<span class="quotelev2">&gt;&gt; inter
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:find_available: querying coll component
</span><br>
<span class="quotelev2">&gt;&gt; tuned
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:find_available: coll component tuned is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:find_available: querying coll component sm
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:sm:init_query: no other local procs;
</span><br>
<span class="quotelev2">&gt;&gt; disqualifying myself
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:find_available: coll component sm is not
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:find_available: querying coll component
</span><br>
<span class="quotelev2">&gt;&gt; libnbc
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:find_available: coll component libnbc is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:find_available: querying coll component
</span><br>
<span class="quotelev2">&gt;&gt; hierarch
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:find_available: coll component hierarch is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:find_available: querying coll component
</span><br>
<span class="quotelev2">&gt;&gt; basic
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:find_available: coll component basic is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:find_available: querying coll component
</span><br>
<span class="quotelev2">&gt;&gt; inter
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:find_available: coll component inter is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:find_available: querying coll component self
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:find_available: coll component self is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:find_available: coll component inter is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:find_available: querying coll component self
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:find_available: coll component self is
</span><br>
<span class="quotelev2">&gt;&gt; available
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] hwloc:base:get_nbojbs computed data 0 of
</span><br>
<span class="quotelev2">&gt;&gt; NUMANode:0
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] hwloc:base:get_nbojbs computed data 0 of
</span><br>
<span class="quotelev2">&gt;&gt; NUMANode:0
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:base:comm_select: new communicator:
</span><br>
<span class="quotelev2">&gt;&gt; MPI_COMM_WORLD (cid 0)
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:base:comm_select: Checking all available
</span><br>
<span class="quotelev2">&gt;&gt; modules
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:tuned:module_tuned query called
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:base:comm_select: component available:
</span><br>
<span class="quotelev2">&gt;&gt; tuned, priority: 30
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:base:comm_select: component available:
</span><br>
<span class="quotelev2">&gt;&gt; libnbc, priority: 10
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; hierarch
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:base:comm_select: component available:
</span><br>
<span class="quotelev2">&gt;&gt; basic, priority: 10
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; inter
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; self
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:tuned:module_init called.
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:tuned:module_init Tuned is in use
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:base:comm_select: new communicator:
</span><br>
<span class="quotelev2">&gt;&gt; MPI_COMM_SELF (cid 1)
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:base:comm_select: Checking all available
</span><br>
<span class="quotelev2">&gt;&gt; modules
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:tuned:module_tuned query called
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; tuned
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:base:comm_select: component available:
</span><br>
<span class="quotelev2">&gt;&gt; libnbc, priority: 10
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; hierarch
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:base:comm_select: component available:
</span><br>
<span class="quotelev2">&gt;&gt; basic, priority: 10
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; inter
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:base:comm_select: component available:
</span><br>
<span class="quotelev2">&gt;&gt; self, priority: 75
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:base:comm_select: new communicator:
</span><br>
<span class="quotelev2">&gt;&gt; MPI_COMM_WORLD (cid 0)
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:base:comm_select: Checking all available
</span><br>
<span class="quotelev2">&gt;&gt; modules
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:tuned:module_tuned query called
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:base:comm_select: component available:
</span><br>
<span class="quotelev2">&gt;&gt; tuned, priority: 30
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:base:comm_select: component available:
</span><br>
<span class="quotelev2">&gt;&gt; libnbc, priority: 10
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; hierarch
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:base:comm_select: component available:
</span><br>
<span class="quotelev2">&gt;&gt; basic, priority: 10
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; inter
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; self
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:tuned:module_init called.
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:tuned:module_init Tuned is in use
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:base:comm_select: new communicator:
</span><br>
<span class="quotelev2">&gt;&gt; MPI_COMM_SELF (cid 1)
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:base:comm_select: Checking all available
</span><br>
<span class="quotelev2">&gt;&gt; modules
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:tuned:module_tuned query called
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; tuned
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:base:comm_select: component available:
</span><br>
<span class="quotelev2">&gt;&gt; libnbc, priority: 10
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; hierarch
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:base:comm_select: component available:
</span><br>
<span class="quotelev2">&gt;&gt; basic, priority: 10
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:base:comm_select: component not available:
</span><br>
<span class="quotelev2">&gt;&gt; inter
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:base:comm_select: component available:
</span><br>
<span class="quotelev2">&gt;&gt; self, priority: 75
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:tuned:component_close: called
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:tuned:component_close: done!
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:tuned:component_close: called
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] coll:tuned:component_close: done!
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: close: component tuned closed
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: close: unloading component tuned
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: close: component libnbc closed
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: close: unloading component libnbc
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: close: unloading component hierarch
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: close: unloading component basic
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: close: unloading component inter
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24492] mca: base: close: unloading component self
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: close: component tuned closed
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: close: unloading component tuned
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: close: component libnbc closed
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: close: unloading component libnbc
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: close: unloading component hierarch
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: close: unloading component basic
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: close: unloading component inter
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] mca: base: close: unloading component self
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [jarico_at_Metropolis-01 examples]$
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; SM is not load because it detects no other processes in the same
</span><br>
<span class="quotelev2">&gt;&gt; machine:
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; [Metropolis-01:24491] coll:sm:init_query: no other local procs;
</span><br>
<span class="quotelev2">&gt;&gt; disqualifying myself
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; The machine is a multicore machine with 8 cores.
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; I need to run SM component code, and I suppose that raising priority
</span><br>
<span class="quotelev2">&gt;&gt; it will be the component selected when problem is solved.
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; El 03/07/2012, a las 21:01, Jeff Squyres escribi&#243;:
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; The issue is that the &quot;sm&quot; coll component only implements a few of
</span><br>
<span class="quotelev2">&gt;&gt; the MPI collective operations.  It is usually mixed at run-time with other
</span><br>
<span class="quotelev2">&gt;&gt; coll components to fill out the rest of the MPI collective operations.
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; So what is happening is that OMPI is determining that it doesn't have
</span><br>
<span class="quotelev2">&gt;&gt; implementations of all the MPI collective operations and aborting.
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; You shouldn't need to manually select your coll module -- OMPI should
</span><br>
<span class="quotelev2">&gt;&gt; automatically select the right collective module for you.  E.g., if all
</span><br>
<span class="quotelev2">&gt;&gt; procs are local on a single machine and sm has a matching implementation
</span><br>
<span class="quotelev2">&gt;&gt; for that MPI collective operation, it'll be used.
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; On Jul 3, 2012, at 2:48 PM, Juan Antonio Rico Gallego wrote:
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; Output is:
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; [Metropolis-01:15355] hwloc:base:get_topology
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; [Metropolis-01:15355] hwloc:base: no cpus specified - using root
</span><br>
<span class="quotelev2">&gt;&gt; available cpuset
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; ========================   JOB MAP   ========================
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; Data for node: Metropolis-01       Num procs: 2
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt;    Process OMPI jobid: [59809,1] App: 0 Process rank: 0
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt;    Process OMPI jobid: [59809,1] App: 0 Process rank: 1
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; =============================================================
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; [Metropolis-01:15356] locality: CL:CU:N:B
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; [Metropolis-01:15356] hwloc:base: get available cpus
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; [Metropolis-01:15356] hwloc:base:get_available_cpus first time -
</span><br>
<span class="quotelev2">&gt;&gt; filtering cpus
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; [Metropolis-01:15356] hwloc:base: no cpus specified - using root
</span><br>
<span class="quotelev2">&gt;&gt; available cpuset
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; [Metropolis-01:15356] hwloc:base:get_available_cpus root object
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; [Metropolis-01:15357] locality: CL:CU:N:B
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; [Metropolis-01:15357] hwloc:base: get available cpus
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; [Metropolis-01:15357] hwloc:base:get_available_cpus first time -
</span><br>
<span class="quotelev2">&gt;&gt; filtering cpus
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; [Metropolis-01:15357] hwloc:base: no cpus specified - using root
</span><br>
<span class="quotelev2">&gt;&gt; available cpuset
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; [Metropolis-01:15357] hwloc:base:get_available_cpus root object
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; [Metropolis-01:15356] hwloc:base:get_nbojbs computed data 0 of
</span><br>
<span class="quotelev2">&gt;&gt; NUMANode:0
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; [Metropolis-01:15357] hwloc:base:get_nbojbs computed data 0 of
</span><br>
<span class="quotelev2">&gt;&gt; NUMANode:0
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; Regards,
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; Juan A. Rico
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt; &gt;&gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; --
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; For corporate legal information go to:
</span><br>
<span class="quotelev2">&gt;&gt; <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt; &gt;&gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt;
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt; &gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt;
</span><br>
<span class="quotelev3">&gt;&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt;&gt; &gt; devel mailing list
</span><br>
<span class="quotelev3">&gt;&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt;
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
<span class="quotelev2">&gt;&gt;
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
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-11231/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="11232.php">Juan A. Rico: "Re: [OMPI devel] SM component init unload"</a>
<li><strong>Previous message:</strong> <a href="11230.php">George Bosilca: "Re: [OMPI devel] SM component init unload"</a>
<li><strong>In reply to:</strong> <a href="11230.php">George Bosilca: "Re: [OMPI devel] SM component init unload"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="11232.php">Juan A. Rico: "Re: [OMPI devel] SM component init unload"</a>
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
