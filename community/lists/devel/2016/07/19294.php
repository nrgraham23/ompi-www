<?
$subject_val = "Re: [OMPI devel] sm BTL performace of the openmpi-2.0.0";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Jul 26 20:34:40 2016" -->
<!-- isoreceived="20160727003440" -->
<!-- sent="Wed, 27 Jul 2016 09:34:32 +0900" -->
<!-- isosent="20160727003432" -->
<!-- name="tmishima_at_[hidden]" -->
<!-- email="tmishima_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] sm BTL performace of the openmpi-2.0.0" -->
<!-- id="OFB809F26C.74399667-ON49257FFD.0002BD37-49257FFD.00032CC0_at_jcity.maeda.co.jp" -->
<!-- charset="UTF-8" -->
<!-- inreplyto="7e2d9885-1fb1-d6b6-7716-056fffb5d1cc_at_rist.or.jp" -->
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
<strong>Subject:</strong> Re: [OMPI devel] sm BTL performace of the openmpi-2.0.0<br>
<strong>From:</strong> <a href="mailto:tmishima_at_[hidden]?Subject=Re:%20[OMPI%20devel]%20sm%20BTL%20performace%20of%20the%20openmpi-2.0.0"><em>tmishima_at_[hidden]</em></a><br>
<strong>Date:</strong> 2016-07-26 20:34:32
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="19295.php">tmishima_at_[hidden]: "Re: [OMPI devel] sm BTL performace of the openmpi-2.0.0"</a>
<li><strong>Previous message:</strong> <a href="19293.php">tmishima_at_[hidden]: "Re: [OMPI devel] sm BTL performace of the openmpi-2.0.0"</a>
<li><strong>In reply to:</strong> <a href="19292.php">Gilles Gouaillardet: "Re: [OMPI devel] sm BTL performace of the openmpi-2.0.0"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="19293.php">tmishima_at_[hidden]: "Re: [OMPI devel] sm BTL performace of the openmpi-2.0.0"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Hi Gilles,
<br>

<br>
I confirmed the vader is used when I don't specify any BTL as you pointed
<br>
out!
<br>

<br>
Regards,
<br>
Tetsuya Mishima
<br>

<br>
[mishima_at_manage OMB-3.1.1-openmpi2.0.0]$ mpirun -np 2 --mca
<br>
btl_base_verbose 10 -bind-to core -report-bindings osu_bw
<br>
[manage.cluster:20006] MCW rank 0 bound to socket 0[core 0[hwt 0]]:
<br>
[B/././././.][./././././.]
<br>
[manage.cluster:20006] MCW rank 1 bound to socket 0[core 1[hwt 0]]:
<br>
[./B/./././.][./././././.]
<br>
[manage.cluster:20011] mca: base: components_register: registering
<br>
framework btl components
<br>
[manage.cluster:20011] mca: base: components_register: found loaded
<br>
component self
<br>
[manage.cluster:20011] mca: base: components_register: component self
<br>
register function successful
<br>
[manage.cluster:20011] mca: base: components_register: found loaded
<br>
component vader
<br>
[manage.cluster:20011] mca: base: components_register: component vader
<br>
register function successful
<br>
[manage.cluster:20011] mca: base: components_register: found loaded
<br>
component tcp
<br>
[manage.cluster:20011] mca: base: components_register: component tcp
<br>
register function successful
<br>
[manage.cluster:20011] mca: base: components_register: found loaded
<br>
component sm
<br>
[manage.cluster:20011] mca: base: components_register: component sm
<br>
register function successful
<br>
[manage.cluster:20011] mca: base: components_register: found loaded
<br>
component openib
<br>
[manage.cluster:20011] mca: base: components_register: component openib
<br>
register function successful
<br>
[manage.cluster:20011] mca: base: components_open: opening btl components
<br>
[manage.cluster:20011] mca: base: components_open: found loaded component
<br>
self
<br>
[manage.cluster:20011] mca: base: components_open: component self open
<br>
function successful
<br>
[manage.cluster:20011] mca: base: components_open: found loaded component
<br>
vader
<br>
[manage.cluster:20011] mca: base: components_open: component vader open
<br>
function successful
<br>
[manage.cluster:20011] mca: base: components_open: found loaded component
<br>
tcp
<br>
[manage.cluster:20011] mca: base: components_open: component tcp open
<br>
function successful
<br>
[manage.cluster:20011] mca: base: components_open: found loaded component
<br>
sm
<br>
[manage.cluster:20011] mca: base: components_open: component sm open
<br>
function successful
<br>
[manage.cluster:20011] mca: base: components_open: found loaded component
<br>
openib
<br>
[manage.cluster:20011] mca: base: components_open: component openib open
<br>
function successful
<br>
[manage.cluster:20011] select: initializing btl component self
<br>
[manage.cluster:20011] select: init of component self returned success
<br>
[manage.cluster:20011] select: initializing btl component vader
<br>
[manage.cluster:20011] select: init of component vader returned success
<br>
[manage.cluster:20011] select: initializing btl component tcp
<br>
[manage.cluster:20011] select: init of component tcp returned success
<br>
[manage.cluster:20011] select: initializing btl component sm
<br>
[manage.cluster:20011] select: init of component sm returned success
<br>
[manage.cluster:20011] select: initializing btl component openib
<br>
[manage.cluster:20011] Checking distance from this process to device=mthca0
<br>
[manage.cluster:20011] hwloc_distances-&gt;nbobjs=2
<br>
[manage.cluster:20011] hwloc_distances-&gt;latency[0]=1.000000
<br>
[manage.cluster:20011] hwloc_distances-&gt;latency[1]=1.600000
<br>
[manage.cluster:20011] hwloc_distances-&gt;latency[2]=1.600000
<br>
[manage.cluster:20011] hwloc_distances-&gt;latency[3]=1.000000
<br>
[manage.cluster:20011] ibv_obj-&gt;type set to NULL
<br>
[manage.cluster:20011] Process is bound: distance to device is 0.000000
<br>
[manage.cluster:20012] mca: base: components_register: registering
<br>
framework btl components
<br>
[manage.cluster:20012] mca: base: components_register: found loaded
<br>
component self
<br>
[manage.cluster:20012] mca: base: components_register: component self
<br>
register function successful
<br>
[manage.cluster:20012] mca: base: components_register: found loaded
<br>
component vader
<br>
[manage.cluster:20012] mca: base: components_register: component vader
<br>
register function successful
<br>
[manage.cluster:20012] mca: base: components_register: found loaded
<br>
component tcp
<br>
[manage.cluster:20012] mca: base: components_register: component tcp
<br>
register function successful
<br>
[manage.cluster:20012] mca: base: components_register: found loaded
<br>
component sm
<br>
[manage.cluster:20012] mca: base: components_register: component sm
<br>
register function successful
<br>
[manage.cluster:20012] mca: base: components_register: found loaded
<br>
component openib
<br>
[manage.cluster:20012] mca: base: components_register: component openib
<br>
register function successful
<br>
[manage.cluster:20012] mca: base: components_open: opening btl components
<br>
[manage.cluster:20012] mca: base: components_open: found loaded component
<br>
self
<br>
[manage.cluster:20012] mca: base: components_open: component self open
<br>
function successful
<br>
[manage.cluster:20012] mca: base: components_open: found loaded component
<br>
vader
<br>
[manage.cluster:20012] mca: base: components_open: component vader open
<br>
function successful
<br>
[manage.cluster:20012] mca: base: components_open: found loaded component
<br>
tcp
<br>
[manage.cluster:20012] mca: base: components_open: component tcp open
<br>
function successful
<br>
[manage.cluster:20012] mca: base: components_open: found loaded component
<br>
sm
<br>
[manage.cluster:20012] mca: base: components_open: component sm open
<br>
function successful
<br>
[manage.cluster:20012] mca: base: components_open: found loaded component
<br>
openib
<br>
[manage.cluster:20012] mca: base: components_open: component openib open
<br>
function successful
<br>
[manage.cluster:20012] select: initializing btl component self
<br>
[manage.cluster:20012] select: init of component self returned success
<br>
[manage.cluster:20012] select: initializing btl component vader
<br>
[manage.cluster:20012] select: init of component vader returned success
<br>
[manage.cluster:20012] select: initializing btl component tcp
<br>
[manage.cluster:20012] select: init of component tcp returned success
<br>
[manage.cluster:20012] select: initializing btl component sm
<br>
[manage.cluster:20012] select: init of component sm returned success
<br>
[manage.cluster:20012] select: initializing btl component openib
<br>
[manage.cluster:20012] Checking distance from this process to device=mthca0
<br>
[manage.cluster:20012] hwloc_distances-&gt;nbobjs=2
<br>
[manage.cluster:20012] hwloc_distances-&gt;latency[0]=1.000000
<br>
[manage.cluster:20012] hwloc_distances-&gt;latency[1]=1.600000
<br>
[manage.cluster:20012] hwloc_distances-&gt;latency[2]=1.600000
<br>
[manage.cluster:20012] hwloc_distances-&gt;latency[3]=1.000000
<br>
[manage.cluster:20012] ibv_obj-&gt;type set to NULL
<br>
[manage.cluster:20012] Process is bound: distance to device is 0.000000
<br>
[manage.cluster:20012] openib BTL: rdmacm CPC unavailable for use on
<br>
mthca0:1; skipped
<br>
[manage.cluster:20011] openib BTL: rdmacm CPC unavailable for use on
<br>
mthca0:1; skipped
<br>
[manage.cluster:20012] [rank=1] openib: using port mthca0:1
<br>
[manage.cluster:20012] select: init of component openib returned success
<br>
[manage.cluster:20011] [rank=0] openib: using port mthca0:1
<br>
[manage.cluster:20011] select: init of component openib returned success
<br>
[manage.cluster:20012] mca: bml: Using self btl for send to [[16477,1],1]
<br>
on node manage
<br>
[manage.cluster:20011] mca: bml: Using self btl for send to [[16477,1],0]
<br>
on node manage
<br>
[manage.cluster:20012] mca: bml: Using vader btl for send to [[16477,1],0]
<br>
on node manage
<br>
[manage.cluster:20011] mca: bml: Using vader btl for send to [[16477,1],1]
<br>
on node manage
<br>
# OSU MPI Bandwidth Test v3.1.1
<br>
# Size        Bandwidth (MB/s)
<br>
1                         1.42
<br>
2                         3.04
<br>
4                         6.06
<br>
8                        12.11
<br>
16                       24.32
<br>
32                       47.78
<br>
64                       85.57
<br>
128                     139.08
<br>
256                     240.59
<br>
512                     415.78
<br>
1024                    848.47
<br>
2048                   1234.08
<br>
4096                    265.53
<br>
8192                    471.28
<br>
16384                   740.52
<br>
32768                  1029.48
<br>
65536                  1191.29
<br>
131072                 1271.51
<br>
262144                 1238.58
<br>
524288                 1246.67
<br>
1048576                1263.01
<br>
2097152                1275.67
<br>
4194304                1281.87
<br>
[manage.cluster:20011] mca: base: close: component self closed
<br>
[manage.cluster:20011] mca: base: close: unloading component self
<br>
[manage.cluster:20012] mca: base: close: component self closed
<br>
[manage.cluster:20012] mca: base: close: unloading component self
<br>
[manage.cluster:20012] mca: base: close: component vader closed
<br>
[manage.cluster:20012] mca: base: close: unloading component vader
<br>
[manage.cluster:20011] mca: base: close: component vader closed
<br>
[manage.cluster:20011] mca: base: close: unloading component vader
<br>
[manage.cluster:20012] mca: base: close: component tcp closed
<br>
[manage.cluster:20012] mca: base: close: unloading component tcp
<br>
[manage.cluster:20011] mca: base: close: component tcp closed
<br>
[manage.cluster:20011] mca: base: close: unloading component tcp
<br>
[manage.cluster:20011] mca: base: close: component sm closed
<br>
[manage.cluster:20011] mca: base: close: unloading component sm
<br>
[manage.cluster:20012] mca: base: close: component sm closed
<br>
[manage.cluster:20012] mca: base: close: unloading component sm
<br>
[manage.cluster:20011] mca: base: close: component openib closed
<br>
[manage.cluster:20011] mca: base: close: unloading component openib
<br>
[manage.cluster:20012] mca: base: close: component openib closed
<br>
[manage.cluster:20012] mca: base: close: unloading component openib
<br>

<br>

<br>
2016/07/27 9:23:34&#227;&#128;&#129;&quot;devel&quot;&#227;&#129;&#149;&#227;&#130;&#147;&#227;&#129;&#175;&#227;&#128;&#140;Re: [OMPI devel] sm BTL performace of
<br>
the openmpi-2.0.0&#227;&#128;&#141;&#227;&#129;&#167;&#230;&#155;&#184;&#227;&#129;&#141;&#227;&#129;&#190;&#227;&#129;&#151;&#227;&#129;&#159;
<br>
<span class="quotelev1">&gt; Also, btl/vader has a higher exclusivity than btl/sm, so if you do not
</span><br>
<span class="quotelev1">&gt; manually specify any btl, vader should be used.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; you can run with
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; --mca btl_base_verbose 10
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; to confirm which btl is used
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Cheers,
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Gilles
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; On 7/27/2016 9:20 AM, Nathan Hjelm wrote:
</span><br>
<span class="quotelev2">&gt; &gt; sm is deprecated in 2.0.0 and will likely be removed in favor of vader
</span><br>
in 2.1.0.
<br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; This issue is probably this known issue:
</span><br>
<a href="https://github.com/open-mpi/ompi-release/pull/1250">https://github.com/open-mpi/ompi-release/pull/1250</a>
<br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Please apply those commits and see if it fixes the issue for you.
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; -Nathan
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; On Jul 26, 2016, at 6:17 PM, tmishima_at_[hidden] wrote:
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Hi Gilles,
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Thanks. I ran again with --mca pml ob1 but I've got the same results
</span><br>
as
<br>
<span class="quotelev3">&gt; &gt;&gt; below:
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [mishima_at_manage OMB-3.1.1-openmpi2.0.0]$ mpirun -np 2 -mca pml ob1
</span><br>
-bind-to
<br>
<span class="quotelev3">&gt; &gt;&gt; core -report-bindings osu_bw
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [manage.cluster:18142] MCW rank 0 bound to socket 0[core 0[hwt 0]]:
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [B/././././.][./././././.]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [manage.cluster:18142] MCW rank 1 bound to socket 0[core 1[hwt 0]]:
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [./B/./././.][./././././.]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; # OSU MPI Bandwidth Test v3.1.1
</span><br>
<span class="quotelev3">&gt; &gt;&gt; # Size        Bandwidth (MB/s)
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 1                         1.48
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 2                         3.07
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 4                         6.26
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 8                        12.53
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 16                       24.33
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 32                       49.03
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 64                       83.46
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 128                     132.60
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 256                     234.96
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 512                     420.86
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 1024                    842.37
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 2048                   1231.65
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 4096                    264.67
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 8192                    472.16
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 16384                   740.42
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 32768                  1030.39
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 65536                  1191.16
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 131072                 1269.45
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 262144                 1238.33
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 524288                 1247.97
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 1048576                1257.96
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 2097152                1274.74
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 4194304                1280.94
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [mishima_at_manage OMB-3.1.1-openmpi2.0.0]$ mpirun -np 2 -mca pml ob1
</span><br>
-mca btl
<br>
<span class="quotelev3">&gt; &gt;&gt; self,sm -bind-to core -report-bindings osu_b
</span><br>
<span class="quotelev3">&gt; &gt;&gt; w
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [manage.cluster:18204] MCW rank 0 bound to socket 0[core 0[hwt 0]]:
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [B/././././.][./././././.]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [manage.cluster:18204] MCW rank 1 bound to socket 0[core 1[hwt 0]]:
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [./B/./././.][./././././.]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; # OSU MPI Bandwidth Test v3.1.1
</span><br>
<span class="quotelev3">&gt; &gt;&gt; # Size        Bandwidth (MB/s)
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 1                         0.52
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 2                         1.05
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 4                         2.08
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 8                         4.18
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 16                        8.21
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 32                       16.65
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 64                       32.60
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 128                      66.70
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 256                     132.45
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 512                     269.27
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 1024                    504.63
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 2048                    819.76
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 4096                    874.54
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 8192                   1447.11
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 16384                  2263.28
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 32768                  3236.85
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 65536                  3567.34
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 131072                 3555.17
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 262144                 3455.76
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 524288                 3441.80
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 1048576                3505.30
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 2097152                3534.01
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 4194304                3546.94
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [mishima_at_manage OMB-3.1.1-openmpi2.0.0]$ mpirun -np 2 -mca pml ob1
</span><br>
-mca btl
<br>
<span class="quotelev3">&gt; &gt;&gt; self,sm,openib -bind-to core -report-binding
</span><br>
<span class="quotelev3">&gt; &gt;&gt; s osu_bw
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [manage.cluster:18218] MCW rank 0 bound to socket 0[core 0[hwt 0]]:
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [B/././././.][./././././.]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [manage.cluster:18218] MCW rank 1 bound to socket 0[core 1[hwt 0]]:
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [./B/./././.][./././././.]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; # OSU MPI Bandwidth Test v3.1.1
</span><br>
<span class="quotelev3">&gt; &gt;&gt; # Size        Bandwidth (MB/s)
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 1                         0.51
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 2                         1.03
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 4                         2.05
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 8                         4.07
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 16                        8.14
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 32                       16.32
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 64                       32.98
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 128                      63.70
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 256                     126.66
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 512                     252.61
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 1024                    480.22
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 2048                    810.54
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 4096                    290.61
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 8192                    512.49
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 16384                   764.60
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 32768                  1036.81
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 65536                  1182.81
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 131072                 1264.48
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 262144                 1235.82
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 524288                 1246.70
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 1048576                1254.66
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 2097152                1274.64
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 4194304                1280.65
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [mishima_at_manage OMB-3.1.1-openmpi2.0.0]$ mpirun -np 2 -mca pml ob1
</span><br>
-mca btl
<br>
<span class="quotelev3">&gt; &gt;&gt; self,openib -bind-to core -report-bindings o
</span><br>
<span class="quotelev3">&gt; &gt;&gt; su_bw
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [manage.cluster:18276] MCW rank 0 bound to socket 0[core 0[hwt 0]]:
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [B/././././.][./././././.]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [manage.cluster:18276] MCW rank 1 bound to socket 0[core 1[hwt 0]]:
</span><br>
<span class="quotelev3">&gt; &gt;&gt; [./B/./././.][./././././.]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; # OSU MPI Bandwidth Test v3.1.1
</span><br>
<span class="quotelev3">&gt; &gt;&gt; # Size        Bandwidth (MB/s)
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 1                         0.54
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 2                         1.08
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 4                         2.18
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 8                         4.33
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 16                        8.69
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 32                       17.39
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 64                       34.34
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 128                      66.28
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 256                     130.36
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 512                     241.81
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 1024                    429.86
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 2048                    553.44
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 4096                    707.14
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 8192                    879.60
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 16384                   763.02
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 32768                  1042.89
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 65536                  1185.45
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 131072                 1267.56
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 262144                 1227.41
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 524288                 1244.61
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 1048576                1255.66
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 2097152                1273.55
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 4194304                1281.05
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 2016/07/27 9:02:49&#227;&#128;&#129;&quot;devel&quot;&#227;&#129;&#149;&#227;&#130;&#147;&#227;&#129;&#175;&#227;&#128;&#140;Re: [OMPI devel] sm BTL performace
</span><br>
of
<br>
<span class="quotelev3">&gt; &gt;&gt; the openmpi-2.0.0&#227;&#128;&#141;&#227;&#129;&#167;&#230;&#155;&#184;&#227;&#129;&#141;&#227;&#129;&#190;&#227;&#129;&#151;&#227;&#129;&#159;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Hi,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; can you please run again with
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; --mca pml ob1
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; if Open MPI was built with mxm support, pml/cm and mtl/mxm are used
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; instead of pml/ob1 and btl/openib
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Cheers,
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Gilles
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt;
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; On 7/27/2016 8:56 AM, tmishima_at_[hidden] wrote:
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; Hi folks,
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; I saw a performance degradation of openmpi-2.0.0 when I ran our
</span><br>
<span class="quotelev3">&gt; &gt;&gt; application
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; on a node (12cores). So I did 4 tests using osu_bw as below:
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 1: mpirun &#226;&#128;&#147;np 2 osu_bw				bad(30% of test2)
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 2: mpirun &#226;&#128;&#147;np 2 &#226;&#128;&#147;mca btl self,sm osu_bw		good(same as
</span><br>
<span class="quotelev3">&gt; &gt;&gt; openmpi1.10.3)
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 3: mpirun &#226;&#128;&#147;np 2 &#226;&#128;&#147;mca btl self,sm,openib osu_bw	bad(30% of test2)
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 4: mpirun &#226;&#128;&#147;np 2 &#226;&#128;&#147;mca btl self,openib osu_bw	bad(30% of test2)
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; I  guess openib BTL was used in the test 1 and 3, because these
</span><br>
results
<br>
<span class="quotelev3">&gt; &gt;&gt; are
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; almost  same  as  test  4. I believe that sm BTL should be used even
</span><br>
in
<br>
<span class="quotelev3">&gt; &gt;&gt; the
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; test 1 and 3, because its priority is higher than openib.
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Unfortunately, at
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; the  moment,  I couldn&#226;&#128;&#153;t figure out the root cause. So please
</span><br>
someone
<br>
<span class="quotelev3">&gt; &gt;&gt; would
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; take care of it.
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; Regards,
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; Tetsuya Mishima
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; P.S. Here I attached these test results.
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt;
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [mishima_at_manage   OMB-3.1.1-openmpi2.0.0]$   mpirun  -np  2
</span><br>
-bind-to
<br>
<span class="quotelev3">&gt; &gt;&gt; core
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; -report-bindings osu_bw
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [manage.cluster:13389]  MCW  rank  0  bound  to  socket  0[core  0
</span><br>
[hwt
<br>
<span class="quotelev3">&gt; &gt;&gt; 0]]:
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [B/././././.][./././././.]
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [manage.cluster:13389]  MCW  rank  1  bound  to  socket  0[core  1
</span><br>
[hwt
<br>
<span class="quotelev3">&gt; &gt;&gt; 0]]:
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [./B/./././.][./././././.]
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; # OSU MPI Bandwidth Test v3.1.1
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; # Size        Bandwidth (MB/s)
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 1                         1.49
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 2                         3.04
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 4                         6.13
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 8                        12.23
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 16                       25.01
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 32                       49.96
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 64                       87.07
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 128                     138.87
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 256                     245.97
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 512                     423.30
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 1024                    865.85
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 2048                   1279.63
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 4096                    264.79
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 8192                    473.92
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 16384                   739.27
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 32768                  1030.49
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 65536                  1190.21
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 131072                 1270.77
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 262144                 1238.74
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 524288                 1245.97
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 1048576                1260.09
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 2097152                1274.53
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 4194304                1285.07
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [mishima_at_manage  OMB-3.1.1-openmpi2.0.0]$  mpirun  -np  2  -mca btl
</span><br>
<span class="quotelev3">&gt; &gt;&gt; self,sm
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; -bind-to core -report-bindings osu_bw
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [manage.cluster:13448]  MCW  rank  0  bound  to  socket  0[core  0
</span><br>
[hwt
<br>
<span class="quotelev3">&gt; &gt;&gt; 0]]:
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [B/././././.][./././././.]
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [manage.cluster:13448]  MCW  rank  1  bound  to  socket  0[core  1
</span><br>
[hwt
<br>
<span class="quotelev3">&gt; &gt;&gt; 0]]:
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [./B/./././.][./././././.]
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; # OSU MPI Bandwidth Test v3.1.1
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; # Size        Bandwidth (MB/s)
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 1                         0.51
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 2                         1.01
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 4                         2.03
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 8                         4.08
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 16                        7.92
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 32                       16.16
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 64                       32.53
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 128                      64.30
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 256                     128.19
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 512                     256.48
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 1024                    468.62
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 2048                    785.29
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 4096                    854.78
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 8192                   1404.51
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 16384                  2249.20
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 32768                  3136.40
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 65536                  3495.84
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 131072                 3436.69
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 262144                 3392.11
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 524288                 3400.07
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 1048576                3460.60
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 2097152                3488.09
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 4194304                3498.45
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [mishima_at_manage    OMB-3.1.1-openmpi2.0.0]$   mpirun   -np   2
</span><br>
-mca
<br>
<span class="quotelev3">&gt; &gt;&gt; btl
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; self,sm,openib -bind-to core -report-bindings osu_bw
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [manage.cluster:13462]  MCW  rank  0  bound  to  socket  0[core  0
</span><br>
[hwt
<br>
<span class="quotelev3">&gt; &gt;&gt; 0]]:
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [B/././././.][./././././.]
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [manage.cluster:13462]  MCW  rank  1  bound  to  socket  0[core  1
</span><br>
[hwt
<br>
<span class="quotelev3">&gt; &gt;&gt; 0]]:
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [./B/./././.][./././././.]
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; # OSU MPI Bandwidth Test v3.1.1
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; # Size        Bandwidth (MB/s)
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 1                         0.54
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 2                         1.09
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 4                         2.18
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 8                         4.37
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 16                        8.75
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 32                       17.37
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 64                       34.67
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 128                      66.66
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 256                     132.55
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 512                     261.52
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 1024                    489.51
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 2048                    818.38
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 4096                    290.48
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 8192                    511.64
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 16384                   765.24
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 32768                  1043.28
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 65536                  1180.48
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 131072                 1261.41
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 262144                 1232.86
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 524288                 1245.70
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 1048576                1245.69
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 2097152                1268.67
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 4194304                1281.33
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [mishima_at_manage  OMB-3.1.1-openmpi2.0.0]$ mpirun -np 2 -mca btl
</span><br>
<span class="quotelev3">&gt; &gt;&gt; self,openib
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; -bind-to core -report-bindings osu_bw
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [manage.cluster:13521]  MCW  rank  0  bound  to  socket  0[core  0
</span><br>
[hwt
<br>
<span class="quotelev3">&gt; &gt;&gt; 0]]:
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [B/././././.][./././././.]
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [manage.cluster:13521]  MCW  rank  1  bound  to  socket  0[core  1
</span><br>
[hwt
<br>
<span class="quotelev3">&gt; &gt;&gt; 0]]:
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; [./B/./././.][./././././.]
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; # OSU MPI Bandwidth Test v3.1.1
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; # Size        Bandwidth (MB/s)
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 1                         0.54
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 2                         1.08
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 4                         2.16
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 8                         4.34
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 16                        8.64
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 32                       17.25
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 64                       34.30
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 128                      66.13
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 256                     129.99
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 512                     242.26
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 1024                    429.24
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 2048                    556.00
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 4096                    706.80
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 8192                    874.35
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 16384                   762.60
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 32768                  1039.61
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 65536                  1184.03
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 131072                 1267.09
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 262144                 1230.76
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 524288                 1246.92
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 1048576                1255.88
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 2097152                1274.54
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; 4194304
</span><br>
<span class="quotelev3">&gt; &gt;&gt; 1281.63
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; Subscription: <a href="https://www.open-mpi.org/mailman/listinfo.cgi/devel">https://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; &gt;&gt;&gt;&gt; Link to this post:
</span><br>
<span class="quotelev3">&gt; &gt;&gt; <a href="http://www.open-mpi.org/community/lists/devel/2016/07/19288.php">http://www.open-mpi.org/community/lists/devel/2016/07/19288.php</a>
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; devel mailing list
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev4">&gt; &gt;&gt;&gt; Subscription: <a href="https://www.open-mpi.org/mailman/listinfo.cgi/develLink">https://www.open-mpi.org/mailman/listinfo.cgi/develLink</a>
</span><br>
to
<br>
<span class="quotelev3">&gt; &gt;&gt; this post:
</span><br>
<a href="http://www.open-mpi.org/community/lists/devel/2016/07/19289.php">http://www.open-mpi.org/community/lists/devel/2016/07/19289.php</a>
<br>
<span class="quotelev3">&gt; &gt;&gt; _______________________________________________
</span><br>
<span class="quotelev3">&gt; &gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt; &gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Subscription: <a href="https://www.open-mpi.org/mailman/listinfo.cgi/devel">https://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Link to this post:
</span><br>
<a href="http://www.open-mpi.org/community/lists/devel/2016/07/19290.php">http://www.open-mpi.org/community/lists/devel/2016/07/19290.php</a>
<br>
<span class="quotelev2">&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; devel mailing list
</span><br>
<span class="quotelev2">&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; Subscription: <a href="https://www.open-mpi.org/mailman/listinfo.cgi/devel">https://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt; &gt; Link to this post:
</span><br>
<a href="http://www.open-mpi.org/community/lists/devel/2016/07/19291.php">http://www.open-mpi.org/community/lists/devel/2016/07/19291.php</a>
<br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="https://www.open-mpi.org/mailman/listinfo.cgi/develLink">https://www.open-mpi.org/mailman/listinfo.cgi/develLink</a> to
</span><br>
this post: <a href="http://www.open-mpi.org/community/lists/devel/2016/07/19292.php">http://www.open-mpi.org/community/lists/devel/2016/07/19292.php</a><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="19295.php">tmishima_at_[hidden]: "Re: [OMPI devel] sm BTL performace of the openmpi-2.0.0"</a>
<li><strong>Previous message:</strong> <a href="19293.php">tmishima_at_[hidden]: "Re: [OMPI devel] sm BTL performace of the openmpi-2.0.0"</a>
<li><strong>In reply to:</strong> <a href="19292.php">Gilles Gouaillardet: "Re: [OMPI devel] sm BTL performace of the openmpi-2.0.0"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="19293.php">tmishima_at_[hidden]: "Re: [OMPI devel] sm BTL performace of the openmpi-2.0.0"</a>
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
